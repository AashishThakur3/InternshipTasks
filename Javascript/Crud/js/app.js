function getTableData() {
    var members = getMembers();
    if (members.length == 0) {
        document.querySelector('.show-table-info').classList.remove('hide');
    }
    else {
        members.forEach(function (item, index) {
            insertIntoTableView(item, index + 1);
        });
    }
}
// function checkReqFields() {
//     var returnValue;
//     var name = document.querySelector("name").value;
//     var address = document.getElementById("txtAddress").value;

//     returnValue = true;
//     if (name.trim() == "") {
//         document.getElementById("reqTxtName").innerHTML = "* Name is required.";
//         returnValue = false;
//     }
//     if (address.trim() == "") {
//         document.getElementById("reqTxtAddress").innerHTML = "* Address is required.";
//         returnValue = false;
//     }
//     return returnValue;
// }

function getMembers() {
    var memberRecord = localStorage.getItem("members");
    var members = [];
    if (!memberRecord) {
        return members;
    } else {
        members = JSON.parse(memberRecord);
        return members;
    }
}

function insertIntoTableView(item, tableIndex) {
    var table = document.getElementById('member_table');
    var row = table.insertRow();
    var idCell = row.insertCell(0); // id
    var nameCell = row.insertCell(1); // name
    var descriptionCell = row.insertCell(2); // description
    var productNameCell = row.insertCell(3); // name
    var productPriceCell = row.insertCell(4); // email
    var actionCell = row.insertCell(5);

    var guid = item.id;
    idCell.innerHTML = tableIndex;
    nameCell.innerHTML = item.name;
    descriptionCell.innerHTML = item.description;
    productNameCell.innerHTML = item.price;
    productPriceCell.innerHTML = item.quantity;
    actionCell.innerHTML = `<button class="btn btn-sm btn-primary" onclick="showEditModal(${guid})">Edit</button>` + `&nbsp;<button class="btn btn-sm btn-danger" onclick="showDeleteModal(${guid})">Delete</button>`;
}


function guid() {
    return parseInt(Date.now() + Math.random());
}

function saveMemberInfo() {
    var keys = ['name', 'description', 'price', 'quantity']; // input ids
    var obj = {};

    keys.forEach(function (item) {
        var result = document.getElementById(item).value;
        if (result) {
            obj[item] = result;
        }
    });

    var members = getMembers();

    if (Object.keys(obj).length) {
        obj.id = guid();
        members.push(obj);
        var data = JSON.stringify(members);
        localStorage.setItem("members", data);
        // insertIntoTableView(obj, getTotalRowOfTable());
        window.location.reload();
        // document.querySelector('.show-table-info').classList.toggle('hide');
    }
}

function getTotalRowOfTable() {
    var table = document.getElementById('member_table');
    return table.rows.length;
}

function showEditModal(id) {
    var allMembers = getMembers();
    var member = allMembers.find(function (item) {
        return item.id == id;
    });
    $('#edit_name').val(member.name);
    $('#edit_description').val(member.description);
    $('#edit_price').val(member.price);
    $('#edit_quantity').val(member.quantity);
    $('#member_id').val(id);

    $('#editModal').modal();
}

function updateMemberData() {
    var allMembers = getMembers();
    var memberId = $('#member_id').val();

    var member = allMembers.find(function (item) {
        return item.id == memberId;
    })

    member.name = $('#edit_name').val();
    member.description = $('#edit_description').val();
    member.price = $('#edit_price').val();
    member.email = $('#edit_quantity').val();

    var data = JSON.stringify(allMembers);
    localStorage.setItem('members', data);
    $('#editModal').modal('hide')
    window.location.reload();
}


function showDeleteModal(id) {
    $('#deleted-member-id').val(id);
    $('#deleteDialog').modal();
}


function deleteMemberData() {
    var id = $('#deleted-member-id').val();

    var storageUsers = JSON.parse(localStorage.getItem('members'));

    var newData = [];

    newData = storageUsers.filter(function (item, index) {
        return item.id != id;
    });

    var data = JSON.stringify(newData);

    localStorage.setItem('members', data);
    $('#deleteDialog').modal('hide');
    window.location.reload();
}
