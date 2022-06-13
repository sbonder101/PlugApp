import 'package:plug/models/category.dart';
import 'package:plug/models/tag.dart';
import 'package:plug/models/vendor_type.dart';

class Search {
  String type = "";
  Category category;
  VendorType vendorType;
  int vendorId;
  int showType;
  SearchType viewType;
  bool byLocation = true;
  bool showProductsTag = false;
  bool showVendorsTag = false;
  bool showServicesTag = false;
  bool showProvidesTag = false;
  String sort = "asc";
  String minPrice;
  String maxPrice;
  List<Tag> tags = [];

  Search({
    this.type = "",
    this.category,
    this.vendorType,
    this.vendorId,
    this.showType,
    this.viewType = SearchType.vendorProducts,
  });

  void genApiType(int selectTagId) {
    switch (selectTagId) {
      case 1:
        type = "vendor";
        break;
      case 2:
        type = "product";
        break;
      case 3:
        type = "service";
        break;
      default:
        type = "product";
    }
  }

  bool showOnlyVendors() {
    // 1 = vendors
    // 2 = products
    // 3 = services
    // 4 = vendors & products
    // 5 = vendors & services
    return showType == 1;
  }

  bool showVendors() {
    return [1, 4, 5].contains(showType);
  }

  bool showProducts() {
    return [2, 4].contains(showType);
  }

  bool showServices() {
    return [3, 5].contains(showType);
  }
}

enum SearchType {
  vendors,
  products,
  services,
  vendorProducts,
  vendorServices,
}

enum SearchFilterType {
  best,
  sales,
  you,
  fresh,
  discount,
}
