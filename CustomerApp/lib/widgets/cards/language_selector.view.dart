// ignore_for_file: deprecated_member_use

import 'package:flutter/material.dart';
import 'package:flag/flag.dart';
import 'package:plug/constants/app_languages.dart';
import 'package:plug/services/auth.service.dart';
import 'package:plug/utils/ui_spacer.dart';
import 'package:plug/widgets/menu_item.dart';
import 'package:i18n_extension/i18n_widget.dart';
import 'package:jiffy/jiffy.dart';
import 'package:localize_and_translate/localize_and_translate.dart';
import 'package:velocity_x/velocity_x.dart';

class AppLanguageSelector extends StatelessWidget {
  const AppLanguageSelector({Key key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: VStack(
        [
          //
          "Select your preferred language".tr()
              .text
              .xl
              .semiBold
              .make()
              .py20()
              .px12(),
          UiSpacer.divider(),

          //
          VStack(
            [
              ...(AppLanguages.codes.mapIndexed((code, index) {
                return MenuItem(
                  title: AppLanguages.names[index],
                  suffix: Flag(
                    AppLanguages.flags[index],
                    height: 24,
                    width: 24,
                  ),
                  onPressed: () => _onSelected(context, code),
                );
              }).toList()),
            ],
          ).scrollVertical().expand(),
        ],
      ),
    ).hThreeForth(context);
  }

  void _onSelected(BuildContext context, String code) async {
    I18n.of(context).locale = Locale(code ?? "en");
    await AuthServices.setLocale(code);
    await Jiffy.locale(code);
    //
    await translator.setNewLanguage(
      context,
      newLanguage: code,
      remember: true,
      restart: true,
    );
    //
    context.pop();
  }
}
