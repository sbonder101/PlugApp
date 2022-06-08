import 'package:plug/constants/api.dart';
import 'package:plug/models/api_response.dart';
import 'package:plug/models/category.dart';
import 'package:plug/models/product.dart';
import 'package:plug/services/http.service.dart';

class ProductRequest extends HttpService {
  //
  Future<List<Product>> getProdcuts({
    Map<String, dynamic> queryParams,
    int page = 1,
  }) async {

    Map<String, dynamic> params = {
      ...(queryParams != null ? queryParams : {}),
      "page": "$page",
    };


    final apiResult = await get(
      Api.products,
      queryParameters: params,
    );

    final apiResponse = ApiResponse.fromResponse(apiResult);
    if (apiResponse.allGood) {
      return apiResponse.data
          .map((jsonObject) => Product.fromJson(jsonObject))
          .toList();
    }

    throw apiResponse.message;
  }

  //
  Future<List<Product>> bestProductsRequest(
      {Map<String, dynamic> queryParams, int page = 1}) async {
    final apiResult = await get(
      Api.bestProducts,
      queryParameters: {
        ...(queryParams != null ? queryParams : {}),
        "page": "$page",
      },
    );

    final apiResponse = ApiResponse.fromResponse(apiResult);
    if (apiResponse.allGood) {
      return apiResponse.data
          .map((jsonObject) => Product.fromJson(jsonObject))
          .toList();
    }

    throw apiResponse.message;
  }

  Future<List<Product>> forYouProductsRequest(
      {Map<String, dynamic> queryParams, int page = 1}) async {
    final apiResult = await get(
      Api.forYouProducts,
      queryParameters: {
        ...(queryParams != null ? queryParams : {}),
        "page": "$page",
      },
    );
    final apiResponse = ApiResponse.fromResponse(apiResult);
    if (apiResponse.allGood) {
      return apiResponse.data
          .map((jsonObject) => Product.fromJson(jsonObject))
          .toList();
    }

    throw apiResponse.message;
  }

  Future<List<Product>> searchProduct(
      {int page = 1, String keyword, String type, Category category}) async {
    final apiResult = await get(
      Api.forYouProducts,
      queryParameters: {"page": "$page"},
    );
    final apiResponse = ApiResponse.fromResponse(apiResult);
    if (apiResponse.allGood) {
      return apiResponse.data
          .map((jsonObject) => Product.fromJson(jsonObject))
          .toList();
    }

    throw apiResponse.message;
  }

  //
  Future<Product> productDetails(int id) async {
    //
    final apiResult = await get("${Api.products}/$id");
    final apiResponse = ApiResponse.fromResponse(apiResult);
    if (apiResponse.allGood) {
      return Product.fromJson(apiResponse.body);
    }

    throw apiResponse.message;
  }
}
