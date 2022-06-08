import 'package:flutter/material.dart';
import 'package:plug/constants/app_routes.dart';
import 'package:plug/constants/app_strings.dart';
import 'package:plug/models/delivery_address.dart';
import 'package:plug/requests/delivery_address.request.dart';
import 'package:plug/services/app.service.dart';
import 'package:plug/services/cart.service.dart';
import 'package:plug/services/geocoder.service.dart';
import 'package:plug/view_models/base.view_model.dart';
import 'package:google_maps_place_picker_mb/google_maps_place_picker.dart';
import 'package:velocity_x/velocity_x.dart';

class DeliveryAddressPickerViewModel extends MyBaseViewModel {
  //
  DeliveryAddressRequest deliveryAddressRequest = DeliveryAddressRequest();
  List<DeliveryAddress> deliveryAddresses = [];
  List<DeliveryAddress> unFilterDeliveryAddresses = [];
  final Function(DeliveryAddress) onSelectDeliveryAddress;

  //
  DeliveryAddressPickerViewModel(
      BuildContext context, this.onSelectDeliveryAddress) {
    this.viewContext = context;
  }

  //
  void initialise() {
    //
    fetchDeliveryAddresses();
  }

  //
  fetchDeliveryAddresses() async {
    //
    final vendorId = CartServices.productsInCart.isNotEmpty
        ? CartServices.productsInCart.first.product.vendor.id
        : AppService().vendorId ?? null;

    List<int> vendorIds = (CartServices.productsInCart.isNotEmpty &&
            AppStrings.enableMultipleVendorOrder)
        ? CartServices.productsInCart
            .map((e) => e.product.vendorId)
            .toList()
            .toSet()
            .toList()
        : null;

    setBusy(true);
    try {
      unFilterDeliveryAddresses =
          deliveryAddresses = await deliveryAddressRequest.getDeliveryAddresses(
        vendorId: vendorId,
        vendorIds: vendorIds,
      );
      clearErrors();
    } catch (error) {
      setError(error);
    }
    setBusy(false);
  }

  //
  newDeliveryAddressPressed() async {
    await viewContext.navigator.pushNamed(
      AppRoutes.newDeliveryAddressesRoute,
    );
    fetchDeliveryAddresses();
  }

  //
  void pickFromMap() async {
    //
    PickResult locationResult = await newPlacePicker();

    if (locationResult != null) {
      DeliveryAddress deliveryAddress = DeliveryAddress();
      deliveryAddress.address = locationResult.formattedAddress;
      deliveryAddress.latitude = locationResult.geometry.location.lat;
      deliveryAddress.longitude = locationResult.geometry.location.lng;
      // From coordinates
      setBusy(true);
      final coordinates = new Coordinates(
        deliveryAddress.latitude,
        deliveryAddress.longitude,
      );
      //
      final addresses = await GeocoderService().findAddressesFromCoordinates(
        coordinates,
      );
      deliveryAddress.city = addresses.first.locality;
      setBusy(false);
      //
      this.onSelectDeliveryAddress(deliveryAddress);
    }
  }

  filterResult(String keyword) {
    deliveryAddresses = unFilterDeliveryAddresses
        .where((e) =>
            e.name.toLowerCase().contains(keyword) ||
            e.address.toLowerCase().contains(keyword))
        .toList();
    notifyListeners();
  }
}
