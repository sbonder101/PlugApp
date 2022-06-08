import 'package:flutter/material.dart';
import 'package:plug/models/vendor_type.dart';
import 'package:plug/services/auth.service.dart';
import 'package:plug/views/pages/auth/login.page.dart';
import 'package:plug/views/pages/commerce/commerce.page.dart';
import 'package:plug/views/pages/food/food.page.dart';
import 'package:plug/views/pages/grocery/grocery.page.dart';
import 'package:plug/views/pages/parcel/parcel.page.dart';
import 'package:plug/views/pages/pharmacy/pharmacy.page.dart';
import 'package:plug/views/pages/service/service.page.dart';
import 'package:plug/views/pages/taxi/taxi.page.dart';
import 'package:plug/views/pages/vendor/vendor.page.dart';
import 'package:velocity_x/velocity_x.dart';

class NavigationService {
  static pageSelected(VendorType vendorType,
      {BuildContext context, bool loadNext = true}) async {
    Widget nextpage = vendorTypePage(vendorType);

    //
    if (vendorType.authRequired && !AuthServices.authenticated()) {
      final result = await context.push(
        (context) => LoginPage(
          required: true,
        ),
      );
      //
      if (result == null || !result) {
        return;
      }
    }
    //
    if (loadNext) {
      context.nextPage(nextpage);
    }
  }

  static Widget vendorTypePage(VendorType vendorType, {BuildContext context}) {
    Widget homeView = VendorPage(vendorType);
    switch (vendorType.slug) {
      case "parcel":
        homeView = ParcelPage(vendorType);
        break;
      case "grocery":
        homeView = GroceryPage(vendorType);
        break;
      case "food":
        homeView = FoodPage(vendorType);
        break;
      case "pharmacy":
        homeView = PharmacyPage(vendorType);
        break;
      case "service":
        homeView = ServicePage(vendorType);
        break;
      case "taxi":
        homeView = TaxiPage(vendorType);
        break;
      case "commerce":
        homeView = CommercePage(vendorType);
        break;
      default:
        homeView = VendorPage(vendorType);
        break;
    }
    return homeView;
  }
}
