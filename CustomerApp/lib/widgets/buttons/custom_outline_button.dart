import 'package:flutter/material.dart';
import 'package:plug/constants/app_colors.dart';
import 'package:plug/constants/app_text_styles.dart';
import 'package:plug/utils/ui_spacer.dart';
import 'package:plug/widgets/busy_indicator.dart';
import 'package:i18n_extension/i18n_widget.dart';
import 'package:velocity_x/velocity_x.dart';

class CustomOutlineButton extends StatelessWidget {
  final String title;
  final IconData icon;
  final double iconSize;
  final Widget child;
  final TextStyle titleStyle;
  final Function onPressed;
  final ShapeBorder shape;
  final bool isFixedHeight;
  final double height;
  final bool loading;
  final double shapeRadius;
  final Color color;
  final Color iconColor;

  const CustomOutlineButton({
    this.title,
    this.icon,
    this.iconSize,
    this.iconColor,
    this.child,
    this.onPressed,
    this.shape,
    this.isFixedHeight = false,
    this.height,
    this.loading = false,
    this.shapeRadius = Vx.dp4,
    this.color,
    this.titleStyle,
    Key key,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return ButtonTheme(
      padding: EdgeInsets.all(0),
      child: OutlinedButton(
        style: OutlinedButton.styleFrom(
            tapTargetSize: MaterialTapTargetSize.shrinkWrap,
            primary: this.color ?? AppColor.primaryColor,
            onSurface: this.loading ? AppColor.primaryColor : null,
            shape: this.shape ??
                RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(this.shapeRadius),
                ),
            side: BorderSide(
              color: this.color ?? AppColor.primaryColor,
            )),
        onPressed: this.loading ? null : this.onPressed,
        child: this.loading
            ? BusyIndicator(color: Colors.white)
            : Container(
                width: null, //double.infinity,
                height: this.isFixedHeight ? Vx.dp48 : (this.height ?? Vx.dp48),
                child: this.child ??
                    Row(
                      crossAxisAlignment: CrossAxisAlignment.center,
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: [
                        this.icon != null
                            ? Icon(this.icon,
                                    color: this.iconColor ?? Colors.white,
                                    size: this.iconSize ?? 20,
                                    textDirection: I18n.language == "ar"
                                        ? TextDirection.rtl
                                        : TextDirection.ltr)
                                .pOnly(
                                right: I18n.language == "ar" ? Vx.dp0 : Vx.dp5,
                                left: I18n.language != "ar" ? Vx.dp0 : Vx.dp5,
                              )
                            : UiSpacer.emptySpace(),
                        this.title != null && this.title.isNotBlank
                            ? Text(
                                this.title,
                                textAlign: TextAlign.center,
                                style: this.titleStyle ??
                                    AppTextStyle.h3TitleTextStyle(
                                      color: Colors.white,
                                    ),
                              ).centered()
                            : UiSpacer.emptySpace(),
                      ],
                    ),
              ),
      ),
    );
  }
}
