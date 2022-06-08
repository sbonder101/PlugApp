import 'package:plug/constants/api.dart';
import 'package:plug/models/api_response.dart';
import 'package:plug/models/order_stop.dart';
import 'package:plug/models/package_checkout.dart';
import 'package:plug/models/package_type.dart';
import 'package:plug/services/http.service.dart';

class PackageRequest extends HttpService {
  //
  Future<List<PackageType>> fetchPackageTypes() async {
    final apiResult = await get(Api.packageTypes);
    final apiResponse = ApiResponse.fromResponse(apiResult);

    if (apiResponse.allGood) {
      return (apiResponse.body as List).map((jsonObject) {
        return PackageType.fromJson(jsonObject);
      }).toList();
    } else {
      throw apiResponse.message;
    }
  }

  //
  Future<PackageCheckout> parcelSummary({
    int vendorId,
    int packageTypeId,
    String packageWeight,
    List<OrderStop> stops,
  }) async {
    //
    final locationStops = stops != null
        ? stops.map((e) => {"id": e.deliveryAddress.id}).toList()
        : [];

    final params = {
      "vendor_id": "${vendorId}",
      "package_type_id": "${packageTypeId}",
      "weight": "${packageWeight}",
      "stops": stops != null ? locationStops : [],
    };

    // print("Params ==> $params");
    //
    final apiResult = await get(
      Api.packageOrderSummary,
      queryParameters: params,
    );

    final apiResponse = ApiResponse.fromResponse(apiResult);
    if (apiResponse.allGood) {
      return PackageCheckout.fromJson(apiResponse.body);
    }

    throw apiResponse.message;
  }
}
