import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:flutter_icons/flutter_icons.dart';
import 'package:flutter_typeahead/flutter_typeahead.dart';
import 'package:plug/constants/app_colors.dart';
import 'package:plug/models/user.dart';
import 'package:plug/models/wallet.dart';
import 'package:plug/services/validator.service.dart';
import 'package:plug/utils/ui_spacer.dart';
import 'package:plug/view_models/wallet_transfer.vm.dart';
import 'package:plug/widgets/base.page.dart';
import 'package:plug/widgets/buttons/custom_button.dart';
import 'package:plug/widgets/custom_text_form_field.dart';
import 'package:localize_and_translate/localize_and_translate.dart';
import 'package:stacked/stacked.dart';
import 'package:velocity_x/velocity_x.dart';

import 'widgets/selected_wallet_user.dart';

class WalletTransferPage extends StatelessWidget {
  const WalletTransferPage(this.wallet, {Key key}) : super(key: key);
  //
  final Wallet wallet;

  @override
  Widget build(BuildContext context) {
    return BasePage(
      title: "Wallet Transfer".tr(),
      showLeadingAction: true,
      showAppBar: true,
      body: ViewModelBuilder<WalletTransferViewModel>.reactive(
        viewModelBuilder: () => WalletTransferViewModel(context, wallet),
        onModelReady: (vm) => vm.initialise(),
        builder: (context, vm, child) {
          return Form(
            key: vm.formKey,
            autovalidateMode: AutovalidateMode.onUserInteraction,
            child: VStack(
              [
                //amount
                CustomTextFormField(
                  labelText: "Amount".tr(),
                  inputFormatters: [FilteringTextInputFormatter.digitsOnly],
                  textEditingController: vm.amountTEC,
                  validator: (value) => FormValidator.validateCustom(
                    value,
                    name: "Amount".tr(),
                    rules: "required|lt:${vm.wallet.balance}",
                  ),
                ),
                UiSpacer.formVerticalSpace(),
                //receiver email/phone
                "Receiver".tr().text.lg.semiBold.make(),
                UiSpacer.verticalSpace(space: 6),
                //Receiver row data
                Row(
                  children: [
                    //
                    TypeAheadField(
                      debounceDuration: const Duration(seconds: 1),
                      textFieldConfiguration: TextFieldConfiguration(
                        autofocus: false,
                        decoration: InputDecoration(
                          border: OutlineInputBorder(
                            borderSide: BorderSide(
                              color: AppColor.primaryColor,
                            ),
                          ),
                          hintText: "Email/Phone".tr(),
                          focusedBorder: OutlineInputBorder(
                            borderSide: BorderSide(
                              color: AppColor.primaryColor,
                            ),
                          ),
                          enabledBorder: OutlineInputBorder(
                            borderSide: BorderSide(
                              color: AppColor.primaryColor,
                            ),
                          ),
                        ),
                      ),
                      suggestionsCallback: vm.searchUsers,
                      itemBuilder: (context, User suggestion) {
                        return "${suggestion.name}".text.medium.lg.make().p12();
                      },
                      onSuggestionSelected: vm.userSelected,
                    ).expand(),
                    UiSpacer.horizontalSpace(),
                    //scan qrcode
                    Icon(
                      FlutterIcons.qrcode_ant,
                      size: 32,
                    )
                        .p12()
                        .box
                        .roundedSM
                        .outerShadowSm
                        .color(AppColor.primaryColor)
                        .make()
                        .onInkTap(vm.scanWalletAddress),
                  ],
                ),
                //selected user view
                SelectedWalletUser(vm.selectedUser),

                UiSpacer.formVerticalSpace(),
                //account password
                CustomTextFormField(
                  labelText: "Password".tr(),
                  textEditingController: vm.passwordTEC,
                  obscureText: true,
                  validator: FormValidator.validatePassword,
                ),
                UiSpacer.formVerticalSpace(),
                //send button
                CustomButton(
                  loading: vm.isBusy,
                  title: "Transfer".tr(),
                  onPressed: vm.initiateWalletTransfer,
                ).wFull(context),
                UiSpacer.formVerticalSpace(),
              ],
            ).p20(),
          );
        },
      ),
    );
  }
}
