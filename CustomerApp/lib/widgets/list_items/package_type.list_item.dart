import 'package:flutter/material.dart';
import 'package:plug/constants/app_colors.dart';
import 'package:plug/models/package_type.dart';
import 'package:plug/services/app.service.dart';
import 'package:plug/widgets/custom_image.view.dart';
import 'package:localize_and_translate/localize_and_translate.dart';
import 'package:velocity_x/velocity_x.dart';

class PackageTypeListItem extends StatelessWidget {
  const PackageTypeListItem(
      {this.packageType, this.selected = false, this.onPressed, Key key})
      : super(key: key);

  final PackageType packageType;
  final bool selected;
  final Function onPressed;
  @override
  Widget build(BuildContext context) {
    return HStack(
      [
        //image
        CustomImage(
          imageUrl: packageType.photo,
        ).wh(Vx.dp56, Vx.dp56).pOnly(
              right: AppService.isDirectionRTL(context) ? Vx.dp0 : Vx.dp12,
              left: AppService.isDirectionRTL(context) ? Vx.dp12 : Vx.dp0,
            ),

        VStack(
          [
            //name
            packageType.name.text.semiBold.make(),
            //description
            packageType.description.text.sm.make(),
            //count
            ("Vendors Available".tr() + ":  ")
                .richText
                .withTextSpanChildren(
                  [
                    "${packageType.package_type_pricings_count}"
                        .textSpan.extraBold
                        .make(),
                  ],
                )
                .xs
                .make(),
          ],
        ).expand(),
      ],
      crossAlignment: CrossAxisAlignment.start,
      // alignment: MainAxisAlignment.start,
    )
        .p12()
        .onInkTap(onPressed)
        .box
        .roundedSM
        .border(
          color: selected ? AppColor.primaryColor : Colors.grey[300],
          width: selected ? 2 : 1,
        )
        .make();
  }
}
