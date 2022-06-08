import 'package:flutter/material.dart';
import 'package:plug/constants/app_routes.dart';
import 'package:flutter/src/widgets/framework.dart';
import 'package:plug/models/service.dart';
import 'package:plug/requests/service.request.dart';
import 'package:plug/view_models/base.view_model.dart';
import 'package:plug/views/pages/service/service_booking_summary.page.dart';
import 'package:velocity_x/velocity_x.dart';
import 'package:plug/constants/app_strings.dart';

class ServiceDetailsViewModel extends MyBaseViewModel {
  //
  ServiceDetailsViewModel(BuildContext context, this.service) {
    this.viewContext = context;
  }

  //
  ServiceRequest serviceRequest = ServiceRequest();
  Service service;
  double subTotal = 0.0;
  double total = 0.0;
  final currencySymbol = AppStrings.currencySymbol;

  void getServiceDetails() async {
    //
    setBusyForObject(service, true);

    try {
      final oldProductHeroTag = service.heroTag;
      service = await serviceRequest.serviceDetails(service.id);
      service.heroTag = oldProductHeroTag;

      clearErrors();
    } catch (error) {
      setError(error);
    }
    setBusyForObject(service, false);
  }

  //
  void openVendorPage() {
    viewContext.navigator.pushNamed(
      AppRoutes.vendorDetails,
      arguments: service.vendor,
    );
  }

  bookService() async {
    viewContext.push(
      (context) => ServiceBookingSummaryPage(service),
    );
  }
}
