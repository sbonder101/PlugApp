import 'package:cool_alert/cool_alert.dart';
import 'package:flutter/material.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:plug/constants/api.dart';
import 'package:plug/constants/app_routes.dart';
import 'package:plug/constants/app_strings.dart';
import 'package:plug/models/cart.dart';
import 'package:plug/models/delivery_address.dart';
import 'package:plug/models/product.dart';
import 'package:plug/models/search.dart';
import 'package:plug/models/service.dart';
import 'package:plug/models/vendor.dart';
import 'package:plug/models/vendor_type.dart';
import 'package:plug/services/auth.service.dart';
import 'package:plug/services/cart.service.dart';
import 'package:plug/services/geocoder.service.dart';
import 'package:plug/services/location.service.dart';
import 'package:plug/services/update.service.dart';
import 'package:plug/view_models/payment.view_model.dart';
import 'package:plug/views/pages/auth/login.page.dart';
import 'package:plug/views/pages/cart/cart.page.dart';
import 'package:plug/views/pages/search/search.page.dart';
import 'package:plug/views/pages/service/service_details.page.dart';
import 'package:plug/views/pages/vendor/vendor_reviews.page.dart';
import 'package:plug/widgets/bottomsheets/delivery_address_picker.bottomsheet.dart';
import 'package:geolocator/geolocator.dart';
import 'package:google_maps_flutter/google_maps_flutter.dart';
import 'package:google_maps_place_picker_mb/google_maps_place_picker.dart';
import 'package:i18n_extension/i18n_widget.dart';
import 'package:localize_and_translate/localize_and_translate.dart';
import 'package:stacked/stacked.dart';
import 'package:velocity_x/velocity_x.dart';
import 'package:firestore_repository/firestore_repository.dart';

class MyBaseViewModel extends BaseViewModel with UpdateService {
  //
  BuildContext viewContext;
  final formKey = GlobalKey<FormState>();
  GlobalKey genKey = GlobalKey();
  final currencySymbol = AppStrings.currencySymbol;
  DeliveryAddress deliveryaddress = DeliveryAddress();
  String firebaseVerificationId;
  VendorType vendorType;
  Vendor vendor;

  void initialise() {
    FirestoreRepository();
  }

  openWebpageLink(String url) async {
    PaymentViewModel paymentViewModel = PaymentViewModel();
    await paymentViewModel.openWebpageLink(url);
  }

  //
  //open delivery address picker
  void pickDeliveryAddress() {
    //
    showModalBottomSheet(
        context: viewContext,
        backgroundColor: Colors.transparent,
        isScrollControlled: true,
        builder: (context) {
          return DeliveryAddressPicker(
            allowOnMap: true,
            onSelectDeliveryAddress: (mDeliveryaddress) {
              viewContext.pop();
              deliveryaddress = mDeliveryaddress;
              notifyListeners();

              //
              final address = Address(
                coordinates: Coordinates(
                    deliveryaddress.latitude, deliveryaddress.longitude),
                addressLine: deliveryaddress.address,
              );
              //
              LocationService.currenctAddress = address;
              //
              LocationService.currenctAddressSubject.sink.add(address);
            },
          );
        });
  }

  //
  bool isAuthenticated() {
    return AuthServices.authenticated();
  }

  //
  void openLogin() async {
    await viewContext.nextPage(LoginPage());
    notifyListeners();
  }

  openTerms() {
    final url = Api.terms;
    openWebpageLink(url);
  }

  //
  //
  Future<DeliveryAddress> showDeliveryAddressPicker() async {
    //
    DeliveryAddress selectedDeliveryAddress;

    //
    await showModalBottomSheet(
      context: viewContext,
      isScrollControlled: true,
      backgroundColor: Colors.transparent,
      builder: (context) {
        return DeliveryAddressPicker(
          onSelectDeliveryAddress: (deliveryAddress) {
            viewContext.pop();
            selectedDeliveryAddress = deliveryAddress;
          },
        );
      },
    );

    return selectedDeliveryAddress;
  }

  //
  Future<DeliveryAddress> getLocationCityName(
      DeliveryAddress deliveryAddress) async {
    final coordinates =
        new Coordinates(deliveryAddress.latitude, deliveryAddress.longitude);
    final addresses = await GeocoderService().findAddressesFromCoordinates(
      coordinates,
    );
    //
    deliveryAddress.city = addresses.first.locality;
    deliveryAddress.state = addresses.first.adminArea;
    deliveryAddress.country = addresses.first.countryName;
    return deliveryAddress;
  }

  //
  addToCartDirectly(Product product, int qty, {bool force = false}) async {
    //
    if (qty <= 0) {
      //
      final mProductsInCart = CartServices.productsInCart;
      final previousProductIndex = mProductsInCart.indexWhere(
        (e) => e.product.id == product.id,
      );
      //
      if (previousProductIndex >= 0) {
        mProductsInCart.removeAt(previousProductIndex);
        await CartServices.saveCartItems(mProductsInCart);
      }
      return;
    }
    //
    final cart = Cart();
    cart.price = (product.showDiscount ? product.discountPrice : product.price);
    product.selectedQty = qty;
    cart.product = product;
    cart.selectedQty = product.selectedQty ?? 1;
    cart.options = product.selectedOptions ?? [];
    cart.optionsIds = product.selectedOptions.map((e) => e.id).toList() ?? [];

    //

    try {
      //
      final canAddToCart = await CartServices.canAddToCart(cart);
      if (canAddToCart || force) {
        //
        final mProductsInCart = CartServices.productsInCart;
        final previousProductIndex = mProductsInCart.indexWhere(
          (e) => e.product.id == product.id,
        );
        //
        if (previousProductIndex >= 0) {
          mProductsInCart.removeAt(previousProductIndex);
          mProductsInCart.insert(previousProductIndex, cart);
          await CartServices.saveCartItems(mProductsInCart);
        } else {
          await CartServices.addToCart(cart);
        }
      } else {
        //
        CoolAlert.show(
          context: viewContext,
          title: "Different Vendor".tr(),
          text:
              "Are you sure you'd like to change vendors? Your current items in cart will be lost."
                  .tr(),
          type: CoolAlertType.confirm,
          onConfirmBtnTap: () async {
            //
            viewContext.pop();
            await CartServices.clearCart();
            addToCartDirectly(product, qty, force: true);
          },
        );
      }
    } catch (error) {
      print("Cart Error => $error");
      setError(error);
    }
  }

  //switch to use current location instead of selected delivery address
  void useUserLocation() {
    LocationService.geocodeCurrentLocation();
  }

  //
  openSearch({int showType = 4}) async {
    viewContext.push(
      (context) => SearchPage(
        search: Search(
          vendorType: vendorType,
          showType: showType,
        ),
      ),
    );
  }

  openCart() async {
    viewContext.nextPage(CartPage());
  }

  //
  //
  productSelected(Product product) async {
    Navigator.pushNamed(
      viewContext,
      AppRoutes.product,
      arguments: product,
    );
  }

  servicePressed(Service service) async {
    viewContext.push(
      (context) => ServiceDetailsPage(service),
    );
  }

  openVendorReviews() {
    viewContext.push(
      (context) => VendorReviewsPage(vendor),
    );
  }

  //show toast
  toastSuccessful(String msg) {
    Fluttertoast.showToast(
      msg: msg,
      toastLength: Toast.LENGTH_SHORT,
      gravity: ToastGravity.BOTTOM,
      timeInSecForIosWeb: 2,
      backgroundColor: Colors.green,
      textColor: Colors.white,
      fontSize: 14.0,
    );
  }

  toastError(String msg, {Toast length}) {
    Fluttertoast.showToast(
      msg: msg,
      toastLength: length ?? Toast.LENGTH_SHORT,
      gravity: ToastGravity.BOTTOM,
      timeInSecForIosWeb: 2,
      backgroundColor: Colors.red,
      textColor: Colors.white,
      fontSize: 14.0,
    );
  }

  void fetchCurrentLocation() async {
    //
    Position currentLocation = await Geolocator.getCurrentPosition();
    if (currentLocation == null) {
      currentLocation = await Geolocator.getLastKnownPosition();
    }
    //
    final address = await LocationService.addressFromCoordinates(
      lat: currentLocation?.latitude,
      lng: currentLocation?.longitude,
    );
    //
    LocationService.currenctAddress = address;
    LocationService.currenctAddressSubject.sink.add(address);
  }

  // NEW LOCATION PICKER
  Future<PickResult> newPlacePicker() async {
    return await Navigator.push(
      viewContext,
      MaterialPageRoute(
        builder: (context) => PlacePicker(
          apiKey: AppStrings.googleMapApiKey,
          autocompleteLanguage: I18n.language,
          region: AppStrings.countryCode.trim().split(",").firstWhere(
            (e) => !e.toLowerCase().contains("auto"),
            orElse: () {
              return "";
            },
          ),
          onPlacePicked: (result) {
            Navigator.of(context).pop(result);
          },
          initialPosition: LocationService.currenctAddress != null
              ? LatLng(
                  LocationService.currenctAddress?.coordinates?.latitude,
                  LocationService.currenctAddress?.coordinates?.longitude,
                )
              : null,
          useCurrentLocation: true,
        ),
      ),
    );
  }
}
