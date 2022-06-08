import 'package:flutter/material.dart';
import 'package:plug/constants/app_colors.dart';
import 'package:plug/constants/app_strings.dart';
import 'package:plug/extensions/string.dart';
import 'package:plug/models/service.dart';
import 'package:plug/utils/ui_spacer.dart';
import 'package:plug/utils/utils.dart';
import 'package:plug/widgets/currency_hstack.dart';
import 'package:plug/widgets/custom_image.view.dart';
import 'package:velocity_x/velocity_x.dart';

class GridViewServiceListItem extends StatelessWidget {
  const GridViewServiceListItem({
    this.service,
    this.onPressed,
    Key key,
  }) : super(key: key);

  final Function(Service) onPressed;
  final Service service;
  @override
  Widget build(BuildContext context) {
    return VStack(
      [
        //service image
        Stack(
          children: [
            Hero(
              tag: service.heroTag,
              child: CustomImage(
                imageUrl: service.photos.isNotEmpty ? service.photos.first : "",
                boxFit: BoxFit.cover,
                width: double.infinity,
                height: 80,
              ),
            ),

            //discount
            Positioned(
              bottom: 0,
              left: Utils.isArabic ? 0 : null,
              right: !Utils.isArabic ? 0 : null,
              child: service.showDiscount
                  ? "-${service.discountPercentage}%"
                      .text
                      .white
                      .sm
                      .semiBold
                      .make()
                      .p2()
                      .px4()
                      .box
                      .red500
                      .topRightRounded(value: !Utils.isArabic ? 0 : 10)
                      .topLeftRounded(value: Utils.isArabic ? 0 : 10)
                      .make()
                  : UiSpacer.emptySpace(),
            ),
          ],
        ),

        UiSpacer.verticalSpace(space: 10),
        //name/title
        service.name.text.sm.medium.make().px12(),
        //description and price
        HStack(
          [
            "${service.description == null ? '...' : service.description} ${service.description}"
                .text
                .minFontSize(9)
                .size(9)
                .coolGray400
                .medium
                .maxLines(1)
                .overflow(TextOverflow.ellipsis)
                .make()
                .expand(),
            CurrencyHStack(
              [
                "${AppStrings.currencySymbol}"
                    .text
                    .xs
                    .light
                    .color(AppColor.primaryColor)
                    .make(),
                service.sellPrice
                    .currencyValueFormat()
                    .text
                    .semiBold
                    .color(AppColor.primaryColor)
                    .sm
                    .make(),
              ],
            ),
            " ${service.durationText}".text.medium.xs.make(),
          ],
        ).px12(),
        UiSpacer.verticalSpace(space: 10),
      ],
    )
        .box
        .withRounded(value: 10)
        .color(context.cardColor)
        .outerShadow
        .clip(Clip.antiAlias)
        .makeCentered()
        .onInkTap(
          () => this.onPressed(this.service),
        )
        .py4();
  }
}