import 'package:flutter/material.dart';
import 'package:plug/utils/ui_spacer.dart';
import 'package:plug/view_models/search.vm.dart';
import 'package:plug/views/pages/search/widget/search_type.tag.dart';
import 'package:plug/widgets/cards/custom.visibility.dart';
import 'package:plug/widgets/toogle_grid_view.dart';
import 'package:localize_and_translate/localize_and_translate.dart';
import 'package:velocity_x/velocity_x.dart';

class VendorSearchHeaderview extends StatelessWidget {
  const VendorSearchHeaderview(this.model, {Key key}) : super(key: key);

  final SearchViewModel model;
  @override
  Widget build(BuildContext context) {
    return HStack(
      [
        //
        CustomVisibilty(
          visible: (model?.search?.showServices() ?? false),
          child: SearchTypeTag(
            title: "Services".tr(),
            onPressed: () => model.setSlectedTag(3),
            selected: model.selectTagId == 3,
          ),
        ),

        CustomVisibilty(
          visible: (model?.search?.showProducts() ?? true),
          child: SearchTypeTag(
            title: "Products".tr(),
            onPressed: () => model.setSlectedTag(2),
            selected: model.selectTagId == 2,
          ),
        ),

        // vendors
        CustomVisibilty(
          visible: model.vendorType == null ||
              (!model.vendorType.isService &&
                  (model?.search?.showVendors() ?? true)),
          child: SearchTypeTag(
            title: "Vendors".tr(),
            onPressed: () => model.setSlectedTag(1),
            selected: model.selectTagId == 1,
          ),
        ),
        //providers
        CustomVisibilty(
          visible: model.vendorType != null &&
              model.vendorType.isService &&
              (model?.search?.showVendors() ?? false),
          child: SearchTypeTag(
            title: "Providers".tr(),
            onPressed: () => model.setSlectedTag(1),
            selected: model.selectTagId == 1,
          ),
        ),
        UiSpacer.horizontalSpace().expand(),
        //toggle show grid or listview
        CustomVisibilty(
          visible: model.selectTagId == 2 || model.selectTagId == 3,
          child: ToogleGridViewIcon(
            showGrid: model.showGrid,
            onchange: model.toggleShowGird,
          ),
        ),
      ],
    ).py12();
  }
}
