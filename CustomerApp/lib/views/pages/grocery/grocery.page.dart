import 'package:flutter/material.dart';
import 'package:plug/constants/app_colors.dart';
import 'package:plug/constants/app_strings.dart';
import 'package:plug/enums/product_fetch_data_type.enum.dart';
import 'package:plug/models/vendor_type.dart';
import 'package:plug/view_models/grocery.vm.dart';
import 'package:plug/views/pages/grocery/widgets/grocery_categories.view.dart';
import 'package:plug/views/pages/grocery/widgets/grocery_categories_products.view.dart';
import 'package:plug/views/pages/grocery/widgets/grocery_picks.view.dart';
import 'package:plug/views/pages/vendor/widgets/banners.view.dart';
import 'package:plug/views/pages/vendor/widgets/header.view.dart';
import 'package:plug/views/pages/vendor/widgets/nearby_vendors.view.dart';
import 'package:plug/widgets/base.page.dart';
import 'package:plug/widgets/cards/view_all_vendors.view.dart';
import 'package:localize_and_translate/localize_and_translate.dart';
import 'package:pull_to_refresh/pull_to_refresh.dart';
import 'package:stacked/stacked.dart';
import 'package:velocity_x/velocity_x.dart';

class GroceryPage extends StatefulWidget {
  const GroceryPage(this.vendorType, {Key key}) : super(key: key);

  final VendorType vendorType;
  @override
  _GroceryPageState createState() => _GroceryPageState();
}

class _GroceryPageState extends State<GroceryPage>
    with AutomaticKeepAliveClientMixin<GroceryPage> {
  GlobalKey pageKey = GlobalKey<State>();
  @override
  Widget build(BuildContext context) {
    super.build(context);
    return BasePage(
      showAppBar: true,
      showLeadingAction: !AppStrings.isSingleVendorMode,
      elevation: 0,
      title: "${widget.vendorType.name}",
      appBarColor: context.theme.backgroundColor,
      appBarItemColor: AppColor.primaryColor,
      showCart: true,
      key: pageKey,
      body: ViewModelBuilder<GroceryViewModel>.reactive(
        viewModelBuilder: () => GroceryViewModel(context, widget.vendorType),
        onModelReady: (model) => model.initialise(),
        builder: (context, model, child) {
          return VStack(
            [
              //
              VendorHeader(model: model),

              SmartRefresher(
                enablePullDown: true,
                enablePullUp: false,
                controller: model.refreshController,
                onRefresh: () {
                  model.refreshController.refreshCompleted();
                  setState(() {
                    pageKey = GlobalKey<State>();
                  });
                }, // model.reloadPage,
                child: VStack(
                  [
                    //banners
                    Banners(
                      widget.vendorType,
                      viewportFraction: 0.98,
                    ).px20(),
                    //categories
                    GroceryCategories(widget.vendorType),

                    //today picks
                    GroceryProductsSectionView(
                      "Today Picks".tr() + " 🔥",
                      model.vendorType,
                      showGrid: false,
                      type: ProductFetchDataType.RANDOM,
                    ),
                    //
                    GroceryProductsSectionView(
                      "Flash Sales".tr() + " ⏳",
                      model.vendorType,
                      showGrid: false,
                      type: ProductFetchDataType.FLASH,
                    ),

                    //nearby
                    NearByVendors(widget.vendorType),

                    //top 5 categories products
                    GroceryCategoryProducts(widget.vendorType, length: 6),

                    //view cart and all vendors
                    ViewAllVendorsView(vendorType: widget.vendorType),
                  ],
                ).scrollVertical(),
              ).expand(),
            ],
            // key: model.pageKey,
          );
        },
      ),
    );
  }

  @override
  bool get wantKeepAlive => true;
}
