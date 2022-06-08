import 'package:plug/constants/api.dart';
import 'package:plug/models/api_response.dart';
import 'package:plug/services/http.service.dart';

class SettingsRequest extends HttpService {
  //
  Future<ApiResponse> appSettings() async {
    final apiResult = await get(
      Api.appSettings
    );
    return ApiResponse.fromResponse(apiResult);
  }

}
