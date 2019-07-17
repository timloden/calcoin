
const web3 = new Web3(Web3.currentProvider || new Web3.providers.WebsocketProvider('wss://calcoin.blockchain.azure.com:3300/2eR_wZ-TYGrZ46Tcrp4WJFuM'), null, {});

//contract abi

const web3abi = [{"constant":false,"inputs":[{"name":"agency","type":"address"},{"name":"beneficiary","type":"address"},{"name":"tokens","type":"uint256"}],"name":"_disburse","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"vendor","type":"address"},{"name":"agency","type":"address"},{"name":"tokens","type":"uint256"}],"name":"_exchange","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"beneficiary","type":"address"},{"name":"vendor","type":"address"},{"name":"tokens","type":"uint256"}],"name":"_spend","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[],"name":"acceptOwnership","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"spender","type":"address"},{"name":"tokens","type":"uint256"}],"name":"approve","outputs":[{"name":"success","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"spender","type":"address"},{"name":"tokens","type":"uint256"},{"name":"data","type":"bytes"}],"name":"approveAndCall","outputs":[{"name":"success","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"to","type":"address"},{"name":"tokens","type":"uint256"}],"name":"transfer","outputs":[{"name":"success","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"tokenAddress","type":"address"},{"name":"tokens","type":"uint256"}],"name":"transferAnyERC20Token","outputs":[{"name":"success","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"from","type":"address"},{"name":"to","type":"address"},{"name":"tokens","type":"uint256"}],"name":"transferFrom","outputs":[{"name":"success","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_newOwner","type":"address"}],"name":"transferOwnership","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"inputs":[],"payable":false,"stateMutability":"nonpayable","type":"constructor"},{"payable":true,"stateMutability":"payable","type":"fallback"},{"anonymous":false,"inputs":[{"indexed":true,"name":"_from","type":"address"},{"indexed":true,"name":"_to","type":"address"}],"name":"OwnershipTransferred","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"from","type":"address"},{"indexed":true,"name":"to","type":"address"},{"indexed":false,"name":"tokens","type":"uint256"}],"name":"Transfer","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"tokenOwner","type":"address"},{"indexed":true,"name":"spender","type":"address"},{"indexed":false,"name":"tokens","type":"uint256"}],"name":"Approval","type":"event"},{"constant":true,"inputs":[],"name":"Agency","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"AgencyName","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"name":"tokenOwner","type":"address"},{"name":"spender","type":"address"}],"name":"allowance","outputs":[{"name":"remaining","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"Amount","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"name":"tokenOwner","type":"address"}],"name":"balanceOf","outputs":[{"name":"balance","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"Beneficiary","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"decimals","outputs":[{"name":"","type":"uint8"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"Description","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"name","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"newOwner","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"owner","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"State","outputs":[{"name":"","type":"uint8"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"symbol","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"totalSupply","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"Vendor","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"}];

// contract variables

let contractAddress = "0x22B6fc253CE1066448a32e59a698e760D181cd76";

const web3Contract = new web3.eth.Contract(web3abi, contractAddress);



function getAllToTransactions(targetAddress) {

	let transactions = web3Contract.getPastEvents('Transfer', {
		filter: {to: targetAddress},
	    fromBlock: 0,
	    toBlock: 'latest'
	}, (error, events) => { if (error) {console.log(error);} })
	.then((events) => {
		//console.log(events);
		return events;

	});

	return transactions;
}

function getAllFromTransactions(targetAddress) {


	let transactions = web3Contract.getPastEvents('Transfer', {
		filter: {to: targetAddress},
	    fromBlock: 0,
	    toBlock: 'latest'
	}, (error, events) => { if (error) {console.log(error);} })
	.then((events) => {
		//console.log(events);
		return events;

	});

	return transactions;
}

function getAllTransactions(targetAddress) {


	let transactions = web3Contract.getPastEvents('allEvents', {
	    fromBlock: 0,
	    toBlock: 'latest'
	}, (error, events) => { if (error) {console.log(error);} })
	.then((events) => {
		//console.log(events);
		return events;

	});

	return transactions;
}

function getBlockTime(blockHash) {
	// 0x8a8b2960f4331c34d4b16624d521291c9fcb4525b4846bd6cacb6ff2882e6d1e
	let block = web3.eth.getBlock(blockHash).then((details) => {
		let timestamp = details.timestamp;

		let date = new Date(timestamp*1000);

		date = date.toLocaleString();

		return date;

	 	//console.log(date.toLocaleString());
	});

	return block;
}




