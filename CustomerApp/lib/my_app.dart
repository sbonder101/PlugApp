import 'package:adaptive_theme/adaptive_theme.dart';
import 'package:flutter/material.dart';
import 'package:plug/constants/app_theme.dart';
import 'package:plug/services/app.service.dart';
import 'package:plug/views/pages/splash.page.dart';
import 'package:plug/services/auth.service.dart';
import 'package:localize_and_translate/localize_and_translate.dart';
import 'constants/app_strings.dart';
import 'package:plug/services/router.service.dart' as router;

import 'package:i18n_extension/i18n_widget.dart';

class MyApp extends StatelessWidget {
  const MyApp({Key key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    //
    return AdaptiveTheme(
      light: AppTheme().lightTheme(),
      dark: AppTheme().darkTheme(),
      initial: AdaptiveThemeMode.system,
      builder: (theme, darkTheme) {
        return MaterialApp(
          navigatorKey: AppService().navigatorKey,
          debugShowCheckedModeBanner: false,
          title: AppStrings.appName,
          onGenerateRoute: router.generateRoute,
          onUnknownRoute: (RouteSettings settings) {
            // open your app when is executed from outside when is terminated.
            return router.generateRoute(settings);
          },
          // initialRoute: _startRoute,
          localizationsDelegates: translator.delegates,
          locale: translator.activeLocale,
          supportedLocales: translator.locals(),
          home: I18n(
            child: SplashPage(),
            initialLocale: Locale(AuthServices.getLocale()),
          ),
          theme: theme,
          darkTheme: darkTheme,
        );
      },
    );
  }
}
