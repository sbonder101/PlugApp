import 'dart:async';

import 'package:flutter/src/widgets/framework.dart';
import 'package:plug/constants/app_routes.dart';
import 'package:plug/constants/app_strings.dart';
import 'package:plug/models/vendor.dart';
import 'package:plug/models/vendor_type.dart';
import 'package:plug/requests/vendor.request.dart';
import 'package:plug/services/geocoder.service.dart';
import 'package:plug/services/location.service.dart';
import 'package:plug/view_models/base.view_model.dart';
import 'package:velocity_x/velocity_x.dart';

class NearbyVendorsViewModel extends MyBaseViewModel {
  NearbyVendorsViewModel(BuildContext context, this.vendorType) {
    this.viewContext = context;
  }

  //
  List<Vendor> vendors = [];
  VendorType vendorType;
  int selectedType = 1;
  StreamSubscription<Address> locationStreamSubscription;

  //
  VendorRequest _vendorRequest = VendorRequest();

  //
  initialise() {
    //
    fetchTopVendors();

    //
    locationStreamSubscription = LocationService.currenctAddressSubject.listen(
      (value) {
        //
        fetchTopVendors();
      },
    );
  }

  //
  fetchTopVendors() async {
    if (LocationService?.currenctAddress?.coordinates?.latitude == null) {
      return;
    } else {
      locationStreamSubscription?.cancel();
    }

    setBusy(true);
    try {
      //filter by location if user selects delivery address
      vendors = await _vendorRequest.nearbyVendorsRequest(
        byLocation: AppStrings.enableFatchByLocation,
        params: {
          "vendor_type_id": vendorType.id,
        },
      );

      //
      if (selectedType == 2) {
        vendors = vendors.filter((e) => e.pickup == 1).toList();
      } else if (selectedType == 1) {
        vendors = vendors.filter((e) => e.delivery == 1).toList();
      }
      clearErrors();
    } catch (error) {
      setError(error);
    }
    setBusy(false);
  }

  //
  changeType(int type) {
    selectedType = type;
    fetchTopVendors();
  }

  vendorSelected(Vendor vendor) async {
    viewContext.navigator.pushNamed(
      AppRoutes.vendorDetails,
      arguments: vendor,
    );
  }
}
