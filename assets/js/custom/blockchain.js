
// Blockchain endpoint

// connection variables

const url = "https://calcoin.blockchain.azure.com:3200/2eR_wZ-TYGrZ46Tcrp4WJFuM";
const provider = new ethers.providers.JsonRpcProvider(url);
const signer = provider.getSigner(0);

//contract abi

const abi = [{"constant":false,"inputs":[{"name":"agency","type":"address"},{"name":"beneficiary","type":"address"},{"name":"tokens","type":"uint256"}],"name":"_disburse","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"vendor","type":"address"},{"name":"agency","type":"address"},{"name":"tokens","type":"uint256"}],"name":"_exchange","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"beneficiary","type":"address"},{"name":"vendor","type":"address"},{"name":"tokens","type":"uint256"}],"name":"_spend","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[],"name":"acceptOwnership","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"spender","type":"address"},{"name":"tokens","type":"uint256"}],"name":"approve","outputs":[{"name":"success","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"spender","type":"address"},{"name":"tokens","type":"uint256"},{"name":"data","type":"bytes"}],"name":"approveAndCall","outputs":[{"name":"success","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"to","type":"address"},{"name":"tokens","type":"uint256"}],"name":"transfer","outputs":[{"name":"success","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"tokenAddress","type":"address"},{"name":"tokens","type":"uint256"}],"name":"transferAnyERC20Token","outputs":[{"name":"success","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"from","type":"address"},{"name":"to","type":"address"},{"name":"tokens","type":"uint256"}],"name":"transferFrom","outputs":[{"name":"success","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_newOwner","type":"address"}],"name":"transferOwnership","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"inputs":[],"payable":false,"stateMutability":"nonpayable","type":"constructor"},{"payable":true,"stateMutability":"payable","type":"fallback"},{"anonymous":false,"inputs":[{"indexed":true,"name":"_from","type":"address"},{"indexed":true,"name":"_to","type":"address"}],"name":"OwnershipTransferred","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"from","type":"address"},{"indexed":true,"name":"to","type":"address"},{"indexed":false,"name":"tokens","type":"uint256"}],"name":"Transfer","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"tokenOwner","type":"address"},{"indexed":true,"name":"spender","type":"address"},{"indexed":false,"name":"tokens","type":"uint256"}],"name":"Approval","type":"event"},{"constant":true,"inputs":[],"name":"Agency","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"AgencyName","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"name":"tokenOwner","type":"address"},{"name":"spender","type":"address"}],"name":"allowance","outputs":[{"name":"remaining","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"Amount","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"name":"tokenOwner","type":"address"}],"name":"balanceOf","outputs":[{"name":"balance","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"Beneficiary","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"decimals","outputs":[{"name":"","type":"uint8"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"Description","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"name","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"newOwner","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"owner","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"State","outputs":[{"name":"","type":"uint8"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"symbol","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"totalSupply","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"Vendor","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"}];

// contract variables

let contractAddress = "0x22B6fc253CE1066448a32e59a698e760D181cd76";

let contract = new ethers.Contract(contractAddress, abi, provider);

//let privateKey = '0xF4DACEFDCFD9196040BA6EB35156CE8E7EE3C199E162B370448037020B49FC40';

//let wallet = new ethers.Wallet(privateKey, provider);


//let transactionCountPromise = wallet.getTransactionCount();

// transactionCountPromise.then((transactionCount) => {
//     console.log(transactionCount);
// });



// create wallet

function createWallet() {

	let randomWallet = ethers.Wallet.createRandom();

	//let tempPrivateKey = '0xa2f67698c270a8fc0bbd2bc6a3af4a20b13810e1b4077c78f9cc98aa1056b7b1';

	let walletWithProvider = new ethers.Wallet(tempPrivateKey, provider);

	console.log(walletWithProvider);

	$( ".address" ).html(randomWallet.address);
	$( ".key" ).html(randomWallet.privateKey);
}

// get wallet calcoin balance

function getBalance(targetAddress) {
	//test address let targetAddress = "0xe58bdddb1da06a9bf6c47d25069007e4fcec46b9";
	const balancePromise = contract.balanceOf(targetAddress);

	let Balance = balancePromise.then((balance) => {

	    let currentBalance = balance.toString();

	    return currentBalance;

	    }, (reason) => {

	    	console.log('No balance found for: ' + targetAddress);

	});

	return Balance;

}


let myAddress = '0xe58bdddb1da06a9bf6c47d25069007e4fcec46b9';

// A filter from me to anyone
let filterFromMe = contract.filters.Transfer(myAddress);

//console.log(filterFromMe);




// A filter from anyone to me
let filterToMe = contract.filters.Transfer(null, myAddress);

console.log(filterToMe);




// A filter from me AND to me
let filterFromMeToMe = contract.filters.Transfer(myAddress, myAddress);

contract.on(filterFromMe, (fromAddress, toAddress, value, event) => {
    console.log('I sent', value);
});

contract.on(filterToMe, (fromAddress, toAddress, value, event) => {
    console.log('I received', value);
});

contract.on(filterFromMeToMe, (fromAddress, toAddress, value, event) => {
    console.log('Myself to me', value);
});



function getAllTransactions(targetAddress) {

}



function sendCoins(toAddress) {
	// contract function: transfer
}

function sendToken(req, res, wallet, abi, ico_address) {
  var to = req.query.to;
  var amount = req.query.amount;

  //var contract = new ethers.Contract(ico_address, abi, wallet);

  // How many tokens?
  var numberOfDecimals = 18;
  var numberOfTokens = ethers.utils.parseUnits(amount, numberOfDecimals);

  // Send tokens
  contract.transfer(to, numberOfTokens).then(function(transaction) {
    res.send(transaction);
  })
  .catch(function(e){
    res.status(400);
    res.send(e.responseText);
  })
}
