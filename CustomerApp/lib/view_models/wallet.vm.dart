import 'package:flutter/material.dart';
import 'package:plug/models/wallet.dart';
import 'package:plug/models/wallet_transaction.dart';
import 'package:plug/requests/wallet.request.dart';
import 'package:plug/view_models/payment.view_model.dart';
import 'package:plug/views/pages/wallet/wallet_transfer.page.dart';
import 'package:plug/widgets/bottomsheets/wallet_amount_entry.bottomsheet.dart';
import 'package:plug/widgets/finance/wallet_address.bottom_sheet.dart';
import 'package:pull_to_refresh/pull_to_refresh.dart';
import 'package:velocity_x/velocity_x.dart';

class WalletViewModel extends PaymentViewModel {
  //
  WalletViewModel(BuildContext context) {
    this.viewContext = context;
  }

  //
  WalletRequest walletRequest = WalletRequest();
  Wallet wallet;
  RefreshController refreshController = RefreshController();
  List<WalletTransaction> walletTransactions = [];
  int queryPage = 1;

  //
  initialise() async {
    await getWalletBalance();
    await getWalletTransactions();
  }

  //
  getWalletBalance() async {
    setBusy(true);
    try {
      wallet = await walletRequest.walletBalance();
      clearErrors();
    } catch (error) {
      setError(error);
    }
    setBusy(false);
  }

  getWalletTransactions({bool initialLoading = true}) async {
    //
    if (initialLoading) {
      setBusyForObject(walletTransactions, true);
      refreshController.refreshCompleted();
      queryPage = 1;
    } else {
      queryPage = queryPage + 1;
    }

    try {
      //
      final mWalletTransactions = await walletRequest.walletTransactions(
        page: queryPage,
      );
      //
      if (initialLoading) {
        walletTransactions = mWalletTransactions;
      } else {
        walletTransactions.addAll(mWalletTransactions);
        refreshController.loadComplete();
      }
      clearErrors();
    } catch (error) {
      print("Wallet transactions error ==> $error");
      setErrorForObject(walletTransactions, error);
    }
    setBusyForObject(walletTransactions, false);
  }

  //
  showAmountEntry() {
    showModalBottomSheet(
      context: viewContext,
      isScrollControlled: true,
      builder: (context) {
        return WalletAmountEntryBottomSheet(
          onSubmit: (String amount) {
            viewContext.pop();
            initiateWalletTopUp(amount);
          },
        );
      },
    );
  }

  //
  initiateWalletTopUp(String amount) async {
    setBusy(true);

    try {
      final link = await walletRequest.walletTopup(amount);
      await openWebpageLink(link);
      clearErrors();
    } catch (error) {
      setError(error);
    }
    setBusy(false);
  }

  //Wallet transfer
  showWalletTransferEntry() async {
    final result = await viewContext.push(
      (context) => WalletTransferPage(wallet),
    );

    //
    if (result == null) {
      return;
    }
    //
    getWalletBalance();
    getWalletTransactions();
  }

  showMyWalletAddress() async {
    setBusyForObject(showMyWalletAddress, true);
    final apiResponse = await walletRequest.myWalletAddress();
    //
    if (apiResponse.allGood) {
      showModalBottomSheet(
        isScrollControlled: true,
        context: viewContext,
        isDismissible: false,
        backgroundColor: Colors.transparent,
        builder: (ctx) => WalletAddressBottomSheet(apiResponse),
      );
    } else {
      toastError(apiResponse.message);
    }
    setBusyForObject(showMyWalletAddress, false);
  }
}
