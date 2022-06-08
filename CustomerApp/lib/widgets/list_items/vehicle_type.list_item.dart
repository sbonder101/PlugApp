import 'package:flutter/material.dart';
import 'package:plug/constants/app_colors.dart';
import 'package:plug/constants/app_strings.dart';
import 'package:plug/extensions/string.dart';
import 'package:plug/models/vehicle_type.dart';
import 'package:plug/utils/ui_spacer.dart';
import 'package:plug/view_models/taxi.vm.dart';
import 'package:plug/widgets/custom_image.view.dart';
import 'package:velocity_x/velocity_x.dart';

class VehicleTypeListItem extends StatelessWidget {
  const VehicleTypeListItem(
    this.vm,
    this.vehicleType, {
    Key key,
  }) : super(key: key);
  final VehicleType vehicleType;
  final TaxiViewModel vm;
  @override
  Widget build(BuildContext context) {
    //
    final selected = vm.selectedVehicleType != null &&
        vm.selectedVehicleType.id == vehicleType.id;

    //
    return HStack(
      [
        //
        CustomImage(
          imageUrl: vehicleType.photo,
          width: 50,
          height: 70,
          boxFit: BoxFit.contain,
        ),
        UiSpacer.horizontalSpace(space: 10),
        VStack(
          [
            "${vehicleType.name}"
                .text
                .fontWeight(selected ? FontWeight.w600 : FontWeight.w400)
                .maxLines(1)
                .overflow(TextOverflow.ellipsis)
                .make(),
            "${vehicleType.currency != null ? vehicleType.currency.symbol : AppStrings.currencySymbol}${vehicleType.total}"
                .currencyFormat()
                .text
                .fontWeight(selected ? FontWeight.w600 : FontWeight.w400)
                .make(),
          ],
        ),
      ],
      alignment: MainAxisAlignment.center,
      // crossAlignment: CrossAxisAlignment.center,
    )
        
        .box
        .p8
        // .px12
        .color(selected
            ? AppColor.primaryColor.withOpacity(0.15)
            : AppColor.primaryColor.withOpacity(0.01))
        .roundedSM
        .make()
        .onTap(
          () => vm.changeSelectedVehicleType(vehicleType),
        );
  }
}
