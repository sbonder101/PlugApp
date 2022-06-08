import 'package:flutter/cupertino.dart';
import 'package:plug/constants/app_colors.dart';
import 'package:plug/utils/utils.dart';
import 'package:velocity_x/velocity_x.dart';

class CustomLeading extends StatelessWidget {
  const CustomLeading({Key key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Container(
      margin: EdgeInsets.symmetric(vertical: 14),
      child: Icon(
        Utils.isArabic
            ? CupertinoIcons.chevron_right
            : CupertinoIcons.chevron_left,
        size: 20,
      ).p4()
          .onInkTap(() {
            context.pop();
          })
          .box
          .roundedFull
          .clip(Clip.antiAlias)
          .color(AppColor.primaryColor)
          .make(),
    );
  }
}
