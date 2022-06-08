import 'dart:async';
import 'dart:io';

import 'package:firebase_core/firebase_core.dart';
import 'package:firebase_crashlytics/firebase_crashlytics.dart';
import 'package:firebase_messaging/firebase_messaging.dart';
import 'package:flutter/material.dart';
import 'package:plug/my_app.dart';
import 'package:plug/services/auth.service.dart';
import 'package:plug/services/cart.service.dart';
import 'package:plug/services/general_app.service.dart';
import 'package:plug/services/local_storage.service.dart';
import 'package:plug/services/firebase.service.dart';
import 'package:plug/services/notification.service.dart';
import 'package:i18n_extension/i18n_widget.dart';
import 'package:localize_and_translate/localize_and_translate.dart';

import 'constants/app_languages.dart';

//ssll handshake error
class MyHttpOverrides extends HttpOverrides {
  @override
  HttpClient createHttpClient(SecurityContext context) {
    return super.createHttpClient(context)
      ..badCertificateCallback =
          (X509Certificate cert, String host, int port) => true;
  }
}

void main() async {
  await runZonedGuarded(
    () async {
      WidgetsFlutterBinding.ensureInitialized();

      await translator.init(
        localeType: LocalizationDefaultType.asDefined,
        languagesList: AppLanguages.codes,
        assetsDirectory: 'assets/lang/',
      );

      //
      await LocalStorageService.getPrefs();
      await CartServices.getCartItems();
      //setting up firebase notifications
      await Firebase.initializeApp();
      await NotificationService.clearIrrelevantNotificationChannels();
      await NotificationService.initializeAwesomeNotification();
      await NotificationService.listenToActions();
      await FirebaseService().setUpFirebaseMessaging();
      FirebaseMessaging.onBackgroundMessage(
          GeneralAppService.onBackgroundMessageHandler);

      //prevent ssl error
      HttpOverrides.global = new MyHttpOverrides();
      FlutterError.onError = FirebaseCrashlytics.instance.recordFlutterError;
      // Run app!
      runApp(
        I18n(
          initialLocale: Locale(AuthServices.getLocale()),
          child: LocalizedApp(child: MyApp()),
        ),
      );
    },
    (error, stackTrace) {
      FirebaseCrashlytics.instance.recordError(error, stackTrace);
    },
  );
}
