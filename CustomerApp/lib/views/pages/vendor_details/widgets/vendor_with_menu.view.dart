import 'package:flutter/material.dart';
import 'package:plug/constants/app_colors.dart';
import 'package:plug/models/vendor.dart';
import 'package:plug/utils/ui_spacer.dart';
import 'package:plug/view_models/vendor_details.vm.dart';
import 'package:plug/views/pages/vendor_details/widgets/upload_prescription.btn.dart';
import 'package:plug/views/pages/vendor_details/widgets/vendor_details_header.view.dart';
import 'package:plug/widgets/busy_indicator.dart';
import 'package:plug/widgets/buttons/custom_leading.dart';
import 'package:plug/widgets/cart_page_action.dart';
import 'package:plug/widgets/custom_image.view.dart';
import 'package:plug/widgets/custom_list_view.dart';
import 'package:plug/widgets/list_items/horizontal_product.list_item.dart';
import 'package:stacked/stacked.dart';
import 'package:velocity_x/velocity_x.dart';

class VendorDetailsWithMenuPage extends StatefulWidget {
  VendorDetailsWithMenuPage({this.vendor, Key key}) : super(key: key);

  final Vendor vendor;

  @override
  _VendorDetailsWithMenuPageState createState() =>
      _VendorDetailsWithMenuPageState();
}

class _VendorDetailsWithMenuPageState extends State<VendorDetailsWithMenuPage>
    with TickerProviderStateMixin {
  @override
  Widget build(BuildContext context) {
    return ViewModelBuilder<VendorDetailsViewModel>.reactive(
      viewModelBuilder: () => VendorDetailsViewModel(
        context,
        widget.vendor,
        tickerProvider: this,
      ),
      onModelReady: (model) {
        model.tabBarController = TabController(
          length: model.vendor.menus.length ?? 0,
          vsync: this,
        );
        model.getVendorDetails();
      },
      builder: (context, model, child) {
        return Scaffold(
          backgroundColor: context.backgroundColor,
          floatingActionButton: UploadPrescriptionFab(model),
          body: NestedScrollView(
            headerSliverBuilder: (BuildContext context, bool scrolled) {
              return <Widget>[
                SliverAppBar(
                  expandedHeight: 220,
                  floating: false,
                  pinned: true,
                  leading: CustomLeading(),
                  backgroundColor: AppColor.faintBgColor,
                  actions: [
                    Container(
                      margin: EdgeInsets.symmetric(vertical: 2),
                      child: PageCartAction(),
                    )
                  ],
                  flexibleSpace: FlexibleSpaceBar(
                    centerTitle: true,
                    title: Text(""),
                    background:
                        //vendor image
                        Hero(
                      tag: model.vendor.heroTag,
                      child: CustomImage(
                        imageUrl: model.vendor.featureImage,
                        height: 220,
                        canZoom: true,
                      ).wFull(context),
                    ),
                  ),
                ),
                SliverToBoxAdapter(
                  child: VendorDetailsHeader(
                    model,
                    showFeatureImage: false,
                  ),
                ),
                SliverAppBar(
                  backgroundColor: context.theme.primaryColor,
                  title: "".text.make(),
                  floating: false,
                  pinned: true,
                  snap: false,
                  primary: false,
                  automaticallyImplyLeading: false,
                  flexibleSpace: TabBar(
                    isScrollable: true,
                    indicatorColor: Colors.white,
                    indicatorWeight: 2,
                    controller: model.tabBarController,
                    tabs: model.vendor.menus.map(
                      (menu) {
                        return Tab(
                          text: menu.name,
                        );
                      },
                    ).toList(),
                  ),
                ),
              ];
            },
            body: Container(
              child: model.isBusy
                  ? BusyIndicator().p20().centered()
                  : TabBarView(
                      controller: model.tabBarController,
                      children: model.vendor.menus.map(
                        (menu) {
                          //
                          return CustomListView(
                            noScrollPhysics: true,
                            refreshController:
                                model.getRefreshController(menu.id),
                            canPullUp: true,
                            canRefresh: true,
                            padding: EdgeInsets.symmetric(vertical: 10),
                            dataSet: model.menuProducts[menu.id] ?? [],
                            isLoading: model.busy(menu.id),
                            onLoading: () => model.loadMoreProducts(
                              menu.id,
                              initialLoad: false,
                            ),
                            onRefresh: () => model.loadMoreProducts(menu.id),
                            itemBuilder: (context, index) {
                              //
                              final product =
                                  model.menuProducts[menu.id][index];
                              return HorizontalProductListItem(
                                product,
                                onPressed: model.productSelected,
                                qtyUpdated: model.addToCartDirectly,
                              );
                            },
                            separatorBuilder: (context, index) =>
                                UiSpacer.verticalSpace(space: 5),
                          );
                        },
                      ).toList(),
                    ),
            ),
          ),
        );
      },
    );
  }
}
