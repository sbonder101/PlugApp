import 'package:flutter/material.dart';
import 'package:flutter_icons/flutter_icons.dart';
import 'package:plug/constants/app_colors.dart';
import 'package:plug/utils/ui_spacer.dart';
import 'package:plug/view_models/order_details.vm.dart';
import 'package:plug/widgets/buttons/custom_button.dart';
import 'package:localize_and_translate/localize_and_translate.dart';
import 'package:velocity_x/velocity_x.dart';

class OrderBottomSheet extends StatelessWidget {
  const OrderBottomSheet(this.vm, {Key key}) : super(key: key);
  final OrderDetailsViewModel vm;
  @override
  Widget build(BuildContext context) {
    return vm.order.canCancel && !vm.isBusy
        ? SafeArea(
            child: VStack(
              [
                //
                vm.order.canCancel
                    ? CustomButton(
                        title: "Cancel Order".tr(),
                        color: AppColor.closeColor,
                        icon: FlutterIcons.close_ant,
                        onPressed: vm.cancelOrder,
                        loading: vm.busy(vm.order),
                      ).p20()
                    : UiSpacer.emptySpace(),
              ],
              crossAlignment: CrossAxisAlignment.center,
            ),
          )
            .box
            .shadow
            .color(context.theme.backgroundColor)
            .make()
            .wFull(context)
        : UiSpacer.emptySpace();
  }
}
