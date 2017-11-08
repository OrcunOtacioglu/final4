<div class="sidebar-wrapper" v-show="displayCart" id="sidebar">
    <div class="info-pane">

    </div>
    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="sidebar-text">
                <i class="ti-shopping-cart"></i> Your Order
            </h3>
        </div>
        <div class="sidebar-content">
            <div class="sidebar-tickets-wrapper">
                <ul class="sidebar-tickets-list">
                    <div v-if="items.length === 0" class="alert alert-info" role="alert">
                        Your cart is empty!
                    </div>
                    <li v-for="item in items" class="ticket-box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="ticket-box-header">
                                    <h4>
                                        <i class="ti-ticket"></i> @{{ item.category }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="ticket-box-detail">
                                    <p>Row @{{ item.row }}</p>
                                    <p>Seat @{{ item.number }}</p>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="ticket-box-price">
                                    <p>@{{ item.price }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="ticket-box-footer">
                            <div class="row">
                                <div class="col-md-4 p0 pl10">
                                    <a href="#" class="sidebar-footer-anchor">
                                        <i class="ti-info-alt"></i> Show Info
                                    </a>
                                </div>
                                <div class="col-md-5 p0 pl10">
                                </div>
                                <div class="col-md-3 text-right">
                                    <a href="javascript:void(0)" @click="removeFromCart(item)" class="text-danger">
                                        <i class="ti-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="#" onclick="cart.sendCardData()" class="btn btn-block btn-detur">PROCEED</a>
                </div>
            </div>
        </div>
    </div>
</div>