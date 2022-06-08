import 'package:basic_utils/basic_utils.dart';
import 'package:flutter/material.dart';
import 'package:plug/constants/app_colors.dart';
import 'package:plug/constants/app_strings.dart';
import 'package:i18n_extension/i18n_widget.dart';

class Utils {
  static bool get isArabic => I18n.language == "en";

  static bool get currencyLeftSided {
    final uiConfig = AppStrings.uiConfig;
    if (uiConfig != null && uiConfig["currency"] != null) {
      final currencylOCATION = uiConfig["currency"]["location"] ?? 'right';
      return currencylOCATION.toLowerCase() == "right";
    } else {
      return true;
    }
  }

  static bool isDark(Color color) {
    return ColorUtils.calculateRelativeLuminance(
            color.red, color.green, color.blue) <
        0.5;
  }

  static bool isPrimaryColorDark() {
    final color = AppColor.primaryColor;
    return ColorUtils.calculateRelativeLuminance(
            color.red, color.green, color.blue) <
        0.5;
  }

  static Color textColorByTheme() {
    return isPrimaryColorDark() ? Colors.white : Colors.black;
  }
}
