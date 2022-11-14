//defines global variables
var table = document.getElementById("table");
var rows = [];

//Creates a row and all elemnets within
function CreateRow(){
	//creates rows that are unfilled and ready for inputs and defines tags for searchability
	let row = document.createElement("tr");
	let rownum = document.createElement("td");
		rownum.innerHTML = rows.length + 1;
	let txt = document.createElement("td");
		txt.setAttribute("id","txttd"+rows.length);
	let txtIn = document.createElement("input");
		txtIn.setAttribute("type", "text");
		txtIn.setAttribute("oninput", "UpdateLength(" + rows.length + ")");
		txtIn.setAttribute("id","txtin"+rows.length);
	let len = document.createElement("td")
		len.setAttribute("id","lentd"+rows.length);
		len.setAttribute("class", "number");
		len.innerHTML = 0;
	
	txt.appendChild(txtIn);
	
	//finalizes row
	row.appendChild(rownum);
	row.appendChild(txt);
	row.appendChild(len);
	
	//adds row to row array
	rows[rows.length] = row;
	return row;
}

//updates length element to be length of string in txt input when called
function UpdateLength(index){
	let tdLen = document.getElementById("lentd"+index);
	let txtIn = document.getElementById("txtin"+index);
	tdLen.innerHTML = txtIn.value.length;
}

//unhides created cells or creates cell if none are hidden
function AddCell(){
	let found = false;
	//checks for first hidden cell and unhide it
	for(i = 0; i < rows.length; i++){
		if(rows[i].getAttribute("Hidden")){
			rows[i].removeAttribute("Hidden");
			found = true;
			break;
		}
	}
	//adds a row to the table if none are hidden
	if(!found)
		table.appendChild(CreateRow());
}

//hides last shown cell unless only 1 is shown
function RemoveCell(){
	//checks for last shown cell and hides it, unless there is one cell left
	for(i = rows.length - 1; i >= 0; i--){
		if(!rows[i].getAttribute("Hidden") && i != 0){
			rows[i].setAttribute("Hidden", true);
			break;
		}
	}
}

//sorts the shown cells 
function Sort(){
	let arrHidden = [];
	let arrShown = [];
	//divides rows array into two sets of hidden and shown cells
	//arrShown holds the data values of the cells that were shown
	rows.forEach(function(x, i){
		if(!x.getAttribute("Hidden")){
			arrShown[arrShown.length] = document.getElementById("txtin"+i).value;
		}
		else{
			arrHidden[arrHidden.length] = x;
		}
	});
	//sorts cell values that were shown
	arrShown.sort();
	//resets rows Array
	rows = [];
	//creates new row for each value stored in arrShown
	arrShown.forEach(function(x, i){
		//creates each part of the row and defines values that allow for rows to be searched
		let row = document.createElement("tr");
		let rownum = document.createElement("td");
			rownum.innerHTML = i + 1;
		let txt = document.createElement("td");
			txt.setAttribute("id","txttd"+i);
		let txtIn = document.createElement("input");
			txtIn.setAttribute("type", "text");
			txtIn.setAttribute("oninput", "UpdateLength(" + i + ")");
			txtIn.setAttribute("id","txtin"+i);
		let len = document.createElement("td")
			len.setAttribute("id","lentd"+i);
			len.setAttribute("class", "number");
			len.innerHTML = x.length;
	
			txtIn.value = x;
		txt.appendChild(txtIn);
		
		//finalizes the row
		row.appendChild(rownum);
		row.appendChild(txt);
		row.appendChild(len);
		
		//adds row to rows array
		rows[i] = row;
	});
	//adds all hidden rows back to rows array
	arrHidden.forEach(function(x){
		rows[rows.length] = x;
	});
	//resets table
	table.innerHTML = "<tr><th></th><th>Input</th><th>Length</th></tr>";
	//places each row in rows into the table
	rows.forEach(function(x){
		table.appendChild(x);
	});
}
//adds first row to table at start
table.appendChild(CreateRow());