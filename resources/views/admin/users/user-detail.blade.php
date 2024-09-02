@extends('admin.layouts.app_admin')
@section('styles')
<style>
.section-article {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.btn {
    display: flex;
    align-items: center;
    padding: 10px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.btn-primary { background-color: #3AA31A; color: #fff; }
.btn-danger { background-color: #dc3545; color: #fff; }
.btn-info { background-color: #17a2b8; color: #fff; }
.btn-warning { background-color: #ffc107; color: #212529; }

.icon {
    margin-right: 5px;
}/* Basic modal styling */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    top: 0; /* Stay at the top */
    left: 0; /* Stay at the left */
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    background-color: rgba(0, 0, 0, 0.5); /* Black background with opacity */
    justify-content: center; /* Center modal horizontally */
    align-items: center; /* Center modal vertically */
    z-index: 1050; /* High z-index to ensure it’s on top */
    overflow: auto; /* Enable scroll if needed */
}

/* Modal dialog box */
.modal-dialog {
    background-color: #ffffff; /* White background */
    border-radius: 8px; /* Rounded corners */
    max-width: 700px; /* Increased maximum width */
    width: 90%; /* Responsive width */
    margin: 15px; /* Margin around the modal */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow for depth */
    padding: 20px;
    position: relative;
}

/* Modal header */
.modal-header {
    display: flex;
    justify-content: space-between; /* Space between title and close button */
    align-items: center;
    border-bottom: 1px solid #ddd; /* Light border for separation */
    padding-bottom: 10px; /* Padding below the header */
}

/* Modal title */
.modal-title {
    font-size: 1.25em; /* Slightly larger title */
    font-weight: 600; /* Bold font */
    color: #333; /* Dark text for contrast */
}

/* Close button */
.btn-modal-close {
    border: none;
    background: none;
    cursor: pointer;
    font-size: 1.2em; /* Larger close icon */
    color: #aaa; /* Gray color for icon */
}

.btn-modal-close:hover {
    color: #333; /* Darker color on hover */
}

/* Modal body */
.modal-body {
    margin: 20px 0; /* Margin above and below the body */
}

/* Input group */
.input-group {
    margin-bottom: 20px; /* Increased margin for separation */
}

/* Label styling */
.form-label {
    font-size: 1em; /* Standard font size */
    margin-bottom: 5px; /* Space between label and input */
    color: #555; /* Slightly lighter color for labels */
}

/* Form control */
.form-control {
    width: 100%;
    padding: 12px; /* Increased padding for better touch */
    border: 1px solid #ccc; /* Light border */
    border-radius: 4px; /* Slightly rounded corners */
    font-size: 1em; /* Standard font size */
    box-sizing: border-box; /* Include padding and border in width */
}


/* Modal footer */
.modal-footer {
    display: flex;
    justify-content: flex-end; /* Align buttons to the right */
    padding-top: 5px; /* Padding above the footer */
}

/* Confirm button */
.btn-confirm-info {
    background-color: #3AA31A; /* Bootstrap primary color */
    color: #fff; /* White text */
    border: none; /* No border */
    border-radius: 4px; /* Rounded corners */
    font-size: 1em; /* Standard font size */
    cursor: pointer; /* Pointer cursor */
    transition: background-color 0.3s; /* Smooth transition for hover effect */
    width: 100%; /* Full width */
    text-align: center; /* Center text in the button */
}

.btn-confirm-info:hover {
    background-color: #3AA31A; /* Darker blue on hover */
}


</style>
    <link rel="stylesheet" href="{{ asset('assets') }}/public/assets/nice-select-2/nice-select2.css">
@endsection
@section('content')
<main class="main-area">
    <div class="container user-details-container">
        <div class="partial-view-header">
            <div class="back-btn-area">
                <a href="{{ asset('assets') }}/img/user-manage.html">
                    <span class="icon">
                        <i class="fa-solid fa-arrow-left"></i>
                    </span>
                    <span>Manage Users</span>
                </a>
                <span>/</span>
                <span>Michael Michaelson</span>
            </div>
            <div class="btn-area">
                <a href="../user-dashboard.html" class="btn btn-login-as-user">Log in As User</a>
                <!-- <a href="" class="btn"><i class="fa-solid fa-ellipsis-vertical"></i></a> -->
                <div class="dropdown w-max">
                    <a class="btn btn-dropdown">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </a>

                    <ul class="list-style-none dropdown-menu d-flex flex-column">
                        <li class="dropdown-item">
                            <a class="btn btn-default" href="">Edit Plan</a>
                        </li>
                        <li class="dropdown-item">
                            <a class="btn btn-default" data-toggle="modal" href="#user-trade-limit">Edit Trade
                                limit</a>
                        </li>
                        <li class="dropdown-item">
                            <a class="btn btn-default" data-toggle="modal" href="#user-trade-result">Edit Trade
                                Result</a>
                        </li>
                        <li class="dropdown-item">
                            <a class="btn btn-default text-danger" style="text-decoration: line-through;">View
                                Password</a>
                        </li>
                        <li class="dropdown-item">
                            <a class="btn btn-default" href="">Turn On/Off Verified</a>
                        </li>
                        <li class="dropdown-item">
                            <a class="btn btn-default" href="">Turn On/Off Upgrade Prompt</a>
                        </li>
                        <li class="dropdown-item">
                            <a class="btn btn-default" href="">Turn On/Off Certificate Prompt</a>
                        </li>
                        <li class="dropdown-item">
                            <a class="btn btn-default" href="">Turn On/Off Identity Prompt</a>
                        </li>
                        <li class="dropdown-item">
                            <a class="btn btn-default" href="">Turn On/Off Custom Prompt</a>
                        </li>
                        <li class="dropdown-item">
                            <a class="btn btn-default" href="">Turn On/Off Demo</a>
                        </li>
                        <li class="dropdown-item">
                            <a class="btn btn-default" href="">Delete User</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
      


        <section class="user-preview-section">
            <div class="section-article user-balance-controllers">
                <a href="javascript:void(0)" class="card">
                    <div class="card-icon">
                        <img src="{{ asset('assets') }}/img/admin-icon-money.png">
                    </div>
                    <div class="card-body">
                        <div class="card-title">Balance</div>
                        <div class="card-value">$ 150,000</div>
                    </div>
                    <span class="arrow-icon">
                        <i class="fa-solid fa-angle-right"></i>
                    </span>
                </a>
                <a href="javascript:void(0)" class="card">
                    <div class="card-icon">
                        <img src="{{ asset('assets') }}/img/admin-icon-card.png">
                    </div>
                    <div class="card-body">
                        <div class="card-title">Deposit</div>
                        <div class="card-value">$ 100,000</div>
                    </div>
                    <span class="arrow-icon">
                        <i class="fa-solid fa-angle-right"></i>
                    </span>
                </a>
                <a href="javascript:void(0)" class="card">
                    <div class="card-icon">
                        <img src="{{ asset('assets') }}/img/admin-icon-withdraw.png">
                    </div>
                    <div class="card-body">
                        <div class="card-title">Withdrawals</div>
                        <div class="card-value">$ 75,000</div>
                    </div>
                    <span class="arrow-icon">
                        <i class="fa-solid fa-angle-right"></i>
                    </span>
                </a>
                <a href="javascript:void(0)" class="card">
                    <div class="card-icon">
                        <img src="{{ asset('assets') }}/img/admin-icon-sorting.png">
                    </div>
                    <div class="card-body">
                        <div class="card-title">Transactions</div>
                        <div class="card-value">124</div>
                    </div>
                    <span class="arrow-icon">
                        <i class="fa-solid fa-angle-right"></i>
                    </span>
                </a>
            </div>
      

            <div class="section-article user-controllers">
                <button class="btn btn-primary" onclick="openModal('user-add-balance')">
                    <span class="icon border-rounded"><i class="fa-solid fa-plus"></i></span>
                    <span class="text">Add Balance</span>
                </button>
                <div id="user-add-balance" class="modal">
                    <div class="modal-dialog">
                        <div class="modal-header">
                            <div class="modal-title">Add Balance</div>
                            <button class="btn-modal-close" onclick="closeModal('user-add-balance')">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <label class="form-label">Amount</label>
                                <input class="form-control" type="number" min="0" placeholder="Enter Amount">
                            </div>
                            <div class="input-group">
                                <label class="form-label">Remark</label>
                                <textarea class="form-control" rows="4" placeholder="Enter Remark Yet" style="height: 150px"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-confirm-info">Submit</button>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger" onclick="openModal('user-subtract-balance')">
                    <span class="icon border-rounded"><i class="fa-solid fa-minus"></i></span>
                    <span class="text">Subtract Balance</span>
                </button>
                <div id="user-subtract-balance" class="modal">
                    <div class="modal-dialog">
                        <div class="modal-header">
                            <div class="modal-title">Subtract Balance</div>
                            <button class="btn-modal-close" onclick="closeModal('user-subtract-balance')">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <label class="form-label">Amount</label>
                                <input class="form-control" type="number" min="0" placeholder="Enter Amount">
                            </div>
                            <div class="input-group">
                                <label class="form-label">Remark</label>
                                <textarea class="form-control" rows="4" placeholder="Enter Remark Yet"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-confirm-info">Submit</button>
                        </div>
                    </div>
                </div>
                <a href="javascript:void(0)" class="btn btn-info">
                    <span class="icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
                    <span class="text">Log In History</span>
                </a>
                <button class="btn btn-warning">
                    <span class="icon"><i class="fa-solid fa-ban"></i></span>
                    <span class="text">Ban User</span>
                </button>
            </div>
            
            
           
        </section>
        <section class="user-info-form">
            <div class="section-title">User Information</div>
            <div class="card common-card">
                <div class="card-body">
                    <div class="input-group">
                        <label class="form-label">First Name</label>
                        <input class="form-control" type="text" placeholder="Enter First Name">
                    </div>
                    <div class="input-group">
                        <label class="form-label">Last Name</label>
                        <input class="form-control" type="text" placeholder="Enter Last Name">
                    </div>
                    <div class="input-group">
                        <label class="form-label">Email address</label>
                        <input class="form-control" type="email" placeholder="Enter email address">
                    </div>
                    <div class="input-group">
                        <label class="form-label">Phone number</label>
                        <input class="form-control" type="text" placeholder="Enter Phone number">
                    </div>
                    <div class="input-group">
                        <label class="form-label">Country</label>
                        <input class="form-control" type="text" placeholder="Enter Country">
                    </div>
                    <div class="input-group">
                        <label class="form-label">State</label>
                        <input class="form-control" type="text" placeholder="Enter State">
                    </div>
                    <div class="input-group">
                        <label class="form-label">City</label>
                        <input class="form-control" type="text" placeholder="Enter City">
                    </div>
                    <div class="input-group">
                        <label class="form-label">zip code</label>
                        <input class="form-control" type="number" min="0" placeholder="Enter zip code here">
                    </div>
                    <div class="input-group grid-column-lg-2">
                        <label class="form-label">Address</label>
                        <input class="form-control" type="text" placeholder="Enter Address">
                    </div>
                    <div class="input-group grid-column-lg-2">
                        <label class="form-label">user password</label>
                        <input class="form-control" type="text" placeholder="Enter user password">
                    </div>
                </div>
            </div>

            <div class="section-title">Verification Status</div>
            <div class="card check-files-valid-area">
                <div class="card-header">
                    <div class="verified-qty">1/4 Verified</div>
                </div>
                <div class="card-body check-files-valid-grid d-grid">
                    <div class="card d-flex justify-content-between align-items-center">
                        <p>Email</p>
                        <p class="document-verification-status d-flex justify-content-center align-items-center g-5"
                            verified>
                            <!-- use $('.verification-status').attr "verified" for verify -->
                            <span class="icon d-flex justify-content-center align-items-center"><i
                                    class="fa-solid fa-check"></i></span>
                        </p>
                    </div>
                    <div class="card d-flex justify-content-between align-items-center">
                        <p>Phone number</p>
                        <p
                            class="document-verification-status d-flex justify-content-center align-items-center g-5">
                            <!-- use $('.verification-status').attr "verified" for verify -->
                            <span class="icon d-flex justify-content-center align-items-center"><i
                                    class="fa-solid fa-check"></i></span>
                        </p>
                    </div>
                    <div class="card d-flex justify-content-between align-items-center">
                        <p>2FA Verification</p>
                        <p
                            class="document-verification-status d-flex justify-content-center align-items-center g-5">
                            <!-- use $('.verification-status').attr "verified" for verify -->
                            <span class="icon d-flex justify-content-center align-items-center"><i
                                    class="fa-solid fa-check"></i></span>
                        </p>
                    </div>
                    <div class="card d-flex justify-content-between align-items-center">
                        <p>KYC</p>
                        <p
                            class="document-verification-status d-flex justify-content-center align-items-center g-5">
                            <!-- use $('.verification-status').attr "verified" for verify -->
                            <span class="icon d-flex justify-content-center align-items-center"><i
                                    class="fa-solid fa-check"></i></span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="section-title">Prompts & Permissions</div>
            <div class="card common-card">
                <div class="card-body">
                    <div class="input-group">
                        <label class="form-label">Ban</label>
                        <select class="form-control" id="userPermissionBan" searchable="false">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label class="form-label">Verified</label>
                        <select class="form-control" id="userPermissionVerified" searchable="false">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label class="form-label">Upgrade Prompt</label>
                        <select class="form-control" id="userPermissionUpgradePrompt" searchable="false">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label class="form-label">Certificate Prompt</label>
                        <select class="form-control" id="userPermissionCertificatePrompt" searchable="false">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label class="form-label">Identity Prompt</label>
                        <select class="form-control" id="userPermissionIdentityPrompt" searchable="false">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label class="form-label">CustomPrompy</label>
                        <select class="form-control" id="userPermissionCustomPrompy" searchable="false">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label class="form-label">Demo</label>
                        <select class="form-control" id="userPermissionDemo" searchable="false">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="section-title">Payment Information</div>
            <div class="card common-card">
                <div class="card-body">
                    <div class="input-group">
                        <label class="form-label">Bitcoin Address</label>
                        <input class="form-control" type="text" placeholder="Enter Bitcoin Address">
                    </div>
                    <div class="input-group">
                        <label class="form-label">USDT Address</label>
                        <input class="form-control" type="text" placeholder="Enter USDT Address">
                    </div>
                    <div class="input-group">
                        <label class="form-label">XMR Address</label>
                        <input class="form-control" type="text" placeholder="Enter XMR Address">
                    </div>
                    <div class="input-group">
                        <label class="form-label">Paypal Tag</label>
                        <input class="form-control" type="text" placeholder="Enter Paypal Tag">
                    </div>
                    <div class="input-group">
                        <label class="form-label">Bank</label>
                        <input class="form-control" type="text" placeholder="Enter Bank">
                    </div>
                    <div class="input-group">
                        <label class="form-label">Account Type</label>
                        <input class="form-control" type="text" placeholder="Account Type">
                    </div>
                    <div class="input-group">
                        <label class="form-label">Account Number</label>
                        <input class="form-control" type="text" placeholder="Enter Account text">
                    </div>
                    <div class="input-group">
                        <label class="form-label">Sort Code</label>
                        <input class="form-control" type="text" placeholder="Enter Sort Code">
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

    
@endsection

@section('scripts')
<script>function openModal(modalId) {
    document.getElementById(modalId).style.display = 'flex';
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

// Optionally, close modals if clicked outside
window.onclick = function(event) {
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
}
</script>
    <script src="{{ asset('assets') }}/data-table-2.1.4/dataTables.js"></script>
    <script src="{{asset('assets')}}/nice-select-2/nice-select2.js"></script>
    <script src="{{ asset('assets/nice-select-2/nice-select2.js') }}"></script>
@endsection