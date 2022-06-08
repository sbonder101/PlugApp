import 'package:plug/constants/api.dart';
import 'package:plug/models/api_response.dart';
import 'package:plug/models/banner.dart';
import 'package:plug/services/http.service.dart';

class BannerRequest extends HttpService {
  //
  Future<List<Banner>> banners({
    int vendorTypeId,
    Map params,
  }) async {
    final apiResult = await get(
      Api.banners,
      queryParameters: {
        "vendor_type_id": vendorTypeId,
        ...(params != null ? params : {}),
      },
    );

    final apiResponse = ApiResponse.fromResponse(apiResult);

    if (apiResponse.allGood) {
      return apiResponse.data
          .map((jsonObject) => Banner.fromJSON(jsonObject))
          .toList();
    } else {
      throw apiResponse.message;
    }
  }
}
