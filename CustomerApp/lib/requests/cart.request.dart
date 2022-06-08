import 'package:plug/constants/api.dart';
import 'package:plug/models/api_response.dart';
import 'package:plug/models/coupon.dart';
import 'package:plug/services/http.service.dart';

class CartRequest extends HttpService {
  //
  Future<Coupon> fetchCoupon(String code) async {
    final apiResult = await get("${Api.coupons}/$code");
    final apiResponse = ApiResponse.fromResponse(apiResult);
    if (apiResponse.allGood) {
      return Coupon.fromJson(apiResponse.body);
    } else {
      throw apiResponse.message;
    }
  }
}
