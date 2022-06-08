import 'package:flutter/material.dart';
import 'package:plug/constants/app_colors.dart';
import 'package:plug/models/payment_method.dart';
import 'package:plug/utils/ui_spacer.dart';
import 'package:plug/widgets/custom_image.view.dart';
import 'package:velocity_x/velocity_x.dart';

class TaxiPaymentItemView extends StatelessWidget {
  const TaxiPaymentItemView(this.paymentMethod,
      {this.selected, this.onselected, Key key})
      : super(key: key);

  final PaymentMethod paymentMethod;
  final bool selected;
  final Function onselected;

  @override
  Widget build(BuildContext context) {
    return HStack(
      [
        //
        CustomImage(
          imageUrl: paymentMethod.photo,
          width: 30,
          height: 30,
        ),
        //
        UiSpacer.horizontalSpace(space: 10),
        "${paymentMethod.name}".text.make(),
      ],
    )
        .p4()
        .box
        .px8
        .roundedSM
        .border(
          color: selected ? AppColor.primaryColor : context.theme.dividerColor,
        )
        .make().onInkTap(onselected);
  }
}
