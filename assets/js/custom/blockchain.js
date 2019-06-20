
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

function createWallet(privateKey) {

	//let randomWallet = ethers.Wallet.createRandom();

	let walletWithProvider = new ethers.Wallet(privateKey, provider);
}

// get wallet calcoin balance

function getBalance(targetAddress) {
	// test address (4000 balance) 0xe58bdddb1da06a9bf6c47d25069007e4fcec46b9
	// new wallet 0xF2FC7E11542f4701EDD460690BCAdA42613FB600

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

//console.log(filterToMe);




// A filter from me AND to me
let filterFromMeToMe = contract.filters.Transfer(myAddress, myAddress);

//console.log(filterFromMeToMe.topics);


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

function sendToken() {

	var fromAddress = document.getElementById('from-address').value;
	var fromPrivateKey = document.getElementById('from-private-key').value;

	var targetAddress = document.getElementById('cam-qr-result').value;
	var amount = document.getElementById('coin-amount').value;

	var wallet = new ethers.Wallet(fromPrivateKey, provider);

	var contract = new ethers.Contract(contractAddress, abi, wallet);

	// How many tokens?
	//var numberOfDecimals = 18;
	//var numberOfTokens = ethers.utils.parseUnits(amount, numberOfDecimals);

	// Listen for Transfer events (triggered after the transaction)

	contract.ontransfer = function(from, to, amount) {
	    //var text = ethers.utils.formatEther(amount);
	    console.log("Transfer");
	    console.log("  From:   ", from);
	    console.log("  To:     ", to);
	    console.log("  Amount: ", text);

	    // Transfer
	    //  From:   0x59DEa134510ebce4a0c7146595dc8A61Eb9D0D79
	    //  To:     0x851b9167B7cbf772D38eFaf89705b35022880A07
	    //  Amount: 1.0
	}
	// Get the balance of the wallet before the transfer
	contract.balanceOf(wallet.address).then(function(balance) {
	    var text = ethers.utils.formatEther(balance);
	    console.log("Balance Before:", text);

	    // Balance Before: 3.141592653589793238
	})

	// Transfer 1.0 token to another address (we have 18 decimals)
	//var targetAddress = "0x851b9167B7cbf772D38eFaf89705b35022880A07";

	//var amount = ethers.utils.parseUnits('1.0', 18);
	contract.transfer(targetAddress, amount).then(function(tx) {
	    // Show the pending transaction
	    console.log(tx);
	    // {
	    //     hash: 0x820cc57bc7...0dbe181ba1,
	    //     gasPrice: BigNumber("0x2540be400"),
	    //     gasLimit: BigNumber("0x16e360"),
	    //     value: BigNumber("0x0"),
	    //     data: "0xa9059cbb" +
	    //           "000000000000000000000000851b9167" +
	    //           "b7cbf772d38efaf89705b35022880a07" +
	    //           "00000000000000000000000000000000" +
	    //           "00000000000000000de0b6b3a7640000",
	    //     to: "0x334eec1482109Bd802D9e72A447848de3bCc1063",
	    //     v: 37,
	    //     r: "0x3fce72962a...a19b611de2",
	    //     s: "0x16f9b70010...0b67a5d396",
	    //     chainId: 1
	    //     from: "0x59DEa134510ebce4a0c7146595dc8A61Eb9D0D79"
	    // }
	    // Wait until the transaction is mined...
	    return tx.wait();
	}).then(function(tx) {
	    console.log('Mined Transaction in block: ', tx.blockNumber);
	    // Get the balance of the wallet after the transfer
	    contract.balanceOf(wallet.address).then(function(balance) {
	        var text = ethers.utils.formatUnits(balance, 18);
	        console.log("Balance After:", text);
	        // Balance After: 2.141592653589793238
	    })
	});
}
