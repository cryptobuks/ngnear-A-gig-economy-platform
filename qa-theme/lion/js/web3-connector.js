/*
    Description: Javascript to process web3 related functions by using Moralis SDK

    This program is free software; you can redistribute it and/or
    modify it under the terms of the GNU General Public License
    as published by the Free Software Foundation; either version 2
    of the License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    More about this license: http://www.question2answer.org/license.php
*/

abi = [{ "inputs": [], "stateMutability": "nonpayable", "type": "constructor" }, { "anonymous": false, "inputs": [{ "indexed": true, "internalType": "address", "name": "owner", "type": "address" }, { "indexed": true, "internalType": "address", "name": "spender", "type": "address" }, { "indexed": false, "internalType": "uint256", "name": "value", "type": "uint256" }], "name": "Approval", "type": "event" }, { "inputs": [{ "internalType": "address", "name": "spender", "type": "address" }, { "internalType": "uint256", "name": "amount", "type": "uint256" }], "name": "approve", "outputs": [{ "internalType": "bool", "name": "", "type": "bool" }], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [{ "internalType": "address", "name": "account", "type": "address" }, { "internalType": "uint256", "name": "amount", "type": "uint256" }], "name": "burn", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [{ "internalType": "address", "name": "spender", "type": "address" }, { "internalType": "uint256", "name": "subtractedValue", "type": "uint256" }], "name": "decreaseAllowance", "outputs": [{ "internalType": "bool", "name": "", "type": "bool" }], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [{ "internalType": "address", "name": "spender", "type": "address" }, { "internalType": "uint256", "name": "addedValue", "type": "uint256" }], "name": "increaseAllowance", "outputs": [{ "internalType": "bool", "name": "", "type": "bool" }], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [{ "internalType": "address", "name": "account", "type": "address" }, { "internalType": "uint256", "name": "amount", "type": "uint256" }], "name": "mint", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "anonymous": false, "inputs": [{ "indexed": true, "internalType": "address", "name": "previousOwner", "type": "address" }, { "indexed": true, "internalType": "address", "name": "newOwner", "type": "address" }], "name": "OwnershipTransferred", "type": "event" }, { "inputs": [], "name": "renounceOwnership", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [{ "internalType": "address", "name": "recipient", "type": "address" }, { "internalType": "uint256", "name": "amount", "type": "uint256" }], "name": "transfer", "outputs": [{ "internalType": "bool", "name": "", "type": "bool" }], "stateMutability": "nonpayable", "type": "function" }, { "anonymous": false, "inputs": [{ "indexed": true, "internalType": "address", "name": "from", "type": "address" }, { "indexed": true, "internalType": "address", "name": "to", "type": "address" }, { "indexed": false, "internalType": "uint256", "name": "value", "type": "uint256" }], "name": "Transfer", "type": "event" }, { "inputs": [{ "internalType": "address", "name": "sender", "type": "address" }, { "internalType": "address", "name": "recipient", "type": "address" }, { "internalType": "uint256", "name": "amount", "type": "uint256" }], "name": "transferFrom", "outputs": [{ "internalType": "bool", "name": "", "type": "bool" }], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [{ "internalType": "address", "name": "newOwner", "type": "address" }], "name": "transferOwnership", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [{ "internalType": "address", "name": "owner", "type": "address" }, { "internalType": "address", "name": "spender", "type": "address" }], "name": "allowance", "outputs": [{ "internalType": "uint256", "name": "", "type": "uint256" }], "stateMutability": "view", "type": "function" }, { "inputs": [{ "internalType": "address", "name": "account", "type": "address" }], "name": "balanceOf", "outputs": [{ "internalType": "uint256", "name": "", "type": "uint256" }], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "decimals", "outputs": [{ "internalType": "uint8", "name": "", "type": "uint8" }], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "name", "outputs": [{ "internalType": "string", "name": "", "type": "string" }], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "owner", "outputs": [{ "internalType": "address", "name": "", "type": "address" }], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "symbol", "outputs": [{ "internalType": "string", "name": "", "type": "string" }], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "totalSupply", "outputs": [{ "internalType": "uint256", "name": "", "type": "uint256" }], "stateMutability": "view", "type": "function" }];
masterAccount = 'paste your wallet address that you used to deploy the contract here';
contractAddress = 'paste the smart contract address here'; //Contract at Aurora Testnet
privateKey = 'paste wallet private key here';

//MORALIS: Disable when using Moralis SDK
var web3;

//Run this to talk to Moralis SDK with Metamask installed. Disable this when using speedynodes endpoint
//const web3 = await Moralis.enableWeb3();

smartContract = new web3.eth.Contract(abi, contractAddress);

/* MORALIS: Login using Moralis SDK */
async function login() {

    const isWeb3Active = Moralis.ensureWeb3IsInstalled();

    const isMetaMaskInstalled = await Moralis.isMetaMaskInstalled();
    console.log("isMetaMaskInstalled: " + isMetaMaskInstalled);

    if (isWeb3Active) {
        console.log("Web3 available");

    } else {
        console.log("No wallet");
        generateEthWallet();
    }

    let user = Moralis.User.current();
    if (!user) {
        user = await Moralis.authenticate({ signingMessage: "Log in using Moralis" })
            .then(function (user) {
                console.log("Logged in user:", user);
                console.log("Wallet address: " + user.get("ethAddress"));

                document.getElementById("wallet").value = user.get("ethAddress");

                //Enable the submit button which was originally disabled
                document.getElementById("submit-button").disabled = false;

            })
            .catch(function (error) {
                console.log(error);
                generateEthWallet();    //Generate a wallet for the user if there's no Metamask installed
                document.getElementById("submit-button").disabled = false;
            });
    } else {
        generateEthWallet();
        document.getElementById("submit-button").disabled = false;
    }
}

async function logOut() {
    await Moralis.User.logOut();
    console.log("logged out");
}

//document.getElementById("btn-login").onclick = login;		//Uncomment this to use Moralis SDK
//document.getElementById("btn-logout").onclick = logOut;


/* To connect using MetaMask */
async function connect() {

    if (window.ethereum) {

        //The below uses ethers.js to connect to Metamask and get address
        //Start
		//Connect to MetaMask
        await ethereum.request({ method: 'eth_requestAccounts' });

        //get provider
        provider = new ethers.providers.Web3Provider(window.ethereum);

        //get signer (I usually use signer because when you connect to contract via signer,
        //you can write to it too, but via provider, you can only read data from contract)
        signer = provider.getSigner();

        //Get connected wallet address
        signerAddress = await signer.getAddress();

        console.log("Wallet address: " + signerAddress);
        //End

        //Use Metamask. Disabled when using Moralis
        web3 = new Web3(ethereum);

        try {

            var version = web3.version;

            console.log("Using web3js version " + version);

            await ethereum.request({ method: 'eth_requestAccounts' });

            //This is another way to retrieve the current wallet address on MetaMask
            /*var accounts = web3.eth.getAccounts(function(error, result) {
                if (error) {
                    console.log(error);
                } else {
                    console.log(result + " is current account");
                }       
            });*/

            //The other recommended way to get wallet address 
            //walletAddress = web3.eth.defaultAccount;

            //Get wallet info in the form of Javascript object
            var account = web3.eth.accounts;

            //Get the current MetaMask selected/active wallet
            walletAddress = account.givenProvider.selectedAddress;

            console.log("Wallet address: " + walletAddress);

            document.getElementById("wallet").value = walletAddress;

            //Enable the submit button which was originally disabled
            document.getElementById("submit-button").disabled = false;

        } catch (error) {
            console.log(error);

        }
    } else {
        console.log("No wallet");
        generateEthWallet();
    }

}


async function mintToken() {

    var account = web3.eth.accounts;

    console.log("Contract address: " + contractAddress);
    console.log("From address: " + masterAccount);

    let tx = {};
    tx.from = masterAccount;
    tx.to = contractAddress;
    tx.data = smartContract.methods.mint(masterAccount, 1000).encodeABI();
    tx.gasLimit = 4700000;

    let signedTx = await account.signTransaction(tx, privateKey);

    // Send the signed transaction using web3
    web3.eth.sendSignedTransaction(signedTx.rawTransaction)
        .on('transactionHash', transactionHash => {

            console.log("Tokens minted!");
            console.log("Transaction Hash: " + transactionHash);

            //After successful minting, submit the form
            document.getElementById("sign-up").submit();

        }).catch(error => {
            alert("Error 355. Please read console log");
            console.log('Error 355: ', error.message);

        });

}


//Generate ETH wallet. Use in the registration form
//Dependency: js/web3-eth-accounts.js
function generateEthWallet() {
    const account = new Web3EthAccounts();
    const keyPair = account.create();
    const pubKey = JSON.parse(JSON.stringify(keyPair.address));
    const privKey = JSON.parse(JSON.stringify(keyPair.privateKey));

    document.getElementById('wallet').value = pubKey;
    document.getElementById('privKey').value = privKey;

    //Enable the submit button which was originally disabled
    document.getElementById("submit-button").disabled = false;

}


async function withdrawCoins(amount, walletAddress) {

    var account = web3.eth.accounts;
    var transaction;

    console.log("Withdrawal contract address: " + contractAddress);
    console.log("From: " + masterAccount);
    console.log("To: " + walletAddress);

    let tx = {};
    tx.from = masterAccount;
    tx.to = contractAddress;
    tx.data = smartContract.methods.transfer(walletAddress, amount).encodeABI();
    tx.gasLimit = 4700000;

    let signedTx = await account.signTransaction(tx, privateKey);

    // Send the signed transaction using web3
    await web3.eth.sendSignedTransaction(signedTx.rawTransaction)
        .on('transactionHash', transactionHash => {

            console.log("Transferred " + amount + " tokens!");
            console.log("Transaction Hash: " + transactionHash);

            transaction = transactionHash;

        }).catch(error => {
            alert("Error 356. Please read console log");
            console.log('Error 356: ', error.message);

        });

    return transaction;

}
