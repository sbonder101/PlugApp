import 'package:flutter/material.dart';
import 'package:plug/constants/app_colors.dart';
import 'package:plug/constants/app_strings.dart';
import 'package:plug/extensions/string.dart';
import 'package:plug/models/service.dart';
import 'package:plug/utils/ui_spacer.dart';
import 'package:plug/widgets/cards/custom.visibility.dart';
import 'package:plug/widgets/currency_hstack.dart';
import 'package:plug/widgets/custom_image.view.dart';
import 'package:velocity_x/velocity_x.dart';

class ServiceListItem extends StatelessWidget {
  const ServiceListItem({
    this.service,
    this.onPressed,
    Key key,
  }) : super(key: key);

  final Function(Service) onPressed;
  final Service service;
  @override
  Widget build(BuildContext context) {
    return HStack(
      [
        //service image
        CustomVisibilty(
          visible: service.photos != null &&
              service.photos.isNotEmpty &&
              service.photos.firstOrNull() != null,
          child: Hero(
            tag: service.heroTag,
            child: CustomImage(
              imageUrl: service.photos.firstOrElse(() => null),
              boxFit: BoxFit.cover,
              width: 75,
              height: 70,
            ).box.clip(Clip.antiAlias).make(),
          ),
        ),
        // "${service.photos}".text.make(),

        VStack(
          [
            //name/title
            service.name.text.base.make(),
            //description
            CustomVisibilty(
              visible:
                  service.description != null && service.description.isNotEmpty,
              child: service.description.text.coolGray600.sm.thin
                  .maxLines(1)
                  .overflow(TextOverflow.ellipsis)
                  .make(),
            ),
            //price
            HStack(
              [
                CurrencyHStack(
                  [
                    "${AppStrings.currencySymbol}"
                        .text
                        .base
                        .light
                        .color(AppColor.primaryColor)
                        .make(),
                    UiSpacer.horizontalSpace(space: 5),
                    service.sellPrice
                        .currencyValueFormat()
                        .text
                        .semiBold
                        .color(AppColor.primaryColor)
                        .xl
                        .make(),
                  ],
                ),
                " ${service.durationText}".text.medium.xs.make(),
                //
                UiSpacer.horizontalSpace(),
                //dsicount
                Visibility(
                  visible: service.showDiscount,
                  child: "- ${service.discountPercentage}%".text.red500.make(),
                ),
              ],
            ),
          ],
        ).py4().px12().expand(),
      ],
    )
        .box
        .withRounded(value: 10)
        .color(context.cardColor)
        .outerShadowSm
        .clip(Clip.antiAlias)
        .makeCentered()
        .onInkTap(
          () => this.onPressed(this.service),
        );
  }
}
