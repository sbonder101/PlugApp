import 'package:flutter/material.dart';
import 'package:plug/models/vendor.dart';
import 'package:plug/view_models/vendor_details.vm.dart';
import 'package:plug/views/pages/vendor_details/service_vendor_details.page.dart';
import 'package:plug/views/pages/vendor_details/widgets/upload_prescription.btn.dart';
import 'package:plug/views/pages/vendor_details/widgets/vendor_with_menu.view.dart';
import 'package:plug/views/pages/vendor_details/widgets/vendor_with_subcategory.view.dart';
import 'package:plug/widgets/base.page.dart';
import 'package:plug/widgets/buttons/custom_leading.dart';
import 'package:plug/widgets/cards/custom.visibility.dart';
import 'package:stacked/stacked.dart';
import 'package:velocity_x/velocity_x.dart';

class VendorDetailsPage extends StatelessWidget {
  VendorDetailsPage({this.vendor, Key key}) : super(key: key);

  final Vendor vendor;

  Widget build(BuildContext context) {
    return ViewModelBuilder<VendorDetailsViewModel>.reactive(
      viewModelBuilder: () => VendorDetailsViewModel(context, vendor),
      onModelReady: (model) => model.getVendorDetails(),
      builder: (context, model, child) {
        return (!model.vendor.hasSubcategories && !model.vendor.isServiceType)
            ? VendorDetailsWithMenuPage(vendor: model.vendor)
            : BasePage(
                showAppBar: true,
                showLeadingAction: true,
                showCart: true,
                elevation: 0,
                extendBodyBehindAppBar: true,
                appBarColor: Colors.transparent,
                backgroundColor: context.backgroundColor,
                leading: CustomLeading(),
                fab: UploadPrescriptionFab(model),
                body: VStack(
                  [
                    //subcategories && hide for service vendor type
                    CustomVisibilty(
                      visible: (model.vendor.hasSubcategories &&
                          !model.vendor.isServiceType),
                      child: VendorDetailsWithSubcategoryPage(
                        vendor: model.vendor,
                      ),
                    ),

                    //show for service vendor type
                    CustomVisibilty(
                      visible: model.vendor.isServiceType,
                      child: ServiceVendorDetailsPage(
                        model,
                        vendor: model.vendor,
                      ),
                    ),
                  ],
                ),
              );
      },
    );
  }
}
