<x-admin.layout>
<div class="container-fluid py-4">
    <div class="d-flex flex-row justify-content-between">
        <h2>Wallets</h2>
        <button class="btn btn-dark" onclick="getAllWallets()">Get All Wallets Records</button>
    </div>

    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                    Name
                </th>

                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                    Email
                </th>

                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                    Wallet ID
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                    Current Balance
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                    Advertiser ID
                </th>
            </tr>
        </thead>
        <tbody id="tbody">
        </tbody>
    </table>
</div>


<script>
    const getAllWallets = () => {
        console.log(`lkwkjelkwjlk`)
        $.ajax({
            url: `https://nitx.io/admin/wallets`,
            type: 'GET',
            success: function(res) {
                $("#tbody").html("")
                console.log(res)
                for (let i = 0; i < res.length; i++) {
                    let name = `<td class="text-center"><span class="text-secondary text-xs font-weight-bold">${res[i].name}</span></td>`
                    let email = `<td class="text-center"><span class="text-secondary text-xs font-weight-bold">${res[i].email}</span></td>`
                    let walletId = `<td class="text-center"><span class="text-secondary text-xs font-weight-bold">${res[i].id}</span></td>`
                    let currentBalance = `<td class="text-center"><span class="text-secondary text-xs font-weight-bold">${res[i].current_balance} SAR</span></td>`
                    let advId = `<td class="text-center"><span class="text-secondary text-xs font-weight-bold">${res[i].advertiser_id}</span></td>`
                    let tr = document.createElement("tr");
                    tr.append($.parseHTML(name)[0])
                    tr.append($.parseHTML(email)[0])
                    tr.append($.parseHTML(walletId)[0])
                    tr.append($.parseHTML(currentBalance)[0])
                    tr.append($.parseHTML(advId)[0])
                    document.querySelector("#tbody").append(tr);
                }
            }
        });
    }
</script>


<div class="container-fluid py-4">
    <h2>Charge Wallet</h2>
    <form action="{{route('admin.charge')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id">Advertiser ID</label>
            <div class="d-flex flex-row">
                <input type="number" class="form-control" id="id" placeholder="Enter advertiser ID" name="id">
                <button type="button" class="btn btn-dark m-2" data-toggle="modal" data-target="#exampleModal" onclick="whoAmI()">
                    Who am I?
                </button>
            </div>
        </div>
        <div class="form-group">
            <label for="charge_amount">Charge Amount in SAR</label></br>
            <label>Note: this filed can accept + or -</label>
            <input type="number" class="form-control" id="charge_amount" placeholder="Enter charge amount in SAR" name="charge_amount">
        </div>
        <div class="d-flex flex-row ">
            <div class="form-check m-1">
                <input class="form-check-input" type="radio" value="deposit" name="type" id="deposit">
                <label class="form-check-label" for="deposit">
                    Deposit
                </label>
            </div>
            <div class="form-check m-1">
                <input class="form-check-input" type="radio" value="withdraw" name="type" id="withdraw" checked>
                <label class="form-check-label" for="withdraw">
                    Withdraw
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Perform</button>
    </form>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Advertiser Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="not-found"></p>
                    <p>Name: <span id="adv-name"></span></p>
                    <p>ID: <span id="adv-id"></span></p>
                    <p>Email: <span id="adv-email"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const whoAmI = () => {
        let id = $('#id').val()
        $.ajax({
            url: `https://nitx.io/Advertiser/${id}`,
            type: 'GET',
            success: function(res) {
                $('#adv-name').text(res.name)
                $('#adv-id').text(res.id)
                $('#adv-email').text(res.email)
                id = ''
            }
        });
    }
</script>
</x-admin.layout>