<div class="sidebar-wrapper" v-show="showCart" id="sidebar">
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
                    <li v-for="item in items" class="ticket-box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="ticket-box-header">
                                    <h4>
                                        <i class="ti-ticket"></i> @{{ item.categoryID }}
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
                                    <p>@{{ item.price }} €</p>
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
                                    <a href="#" class="sidebar-footer-anchor">
                                        <i class="ti-eye"></i> See 3D View
                                    </a>
                                </div>
                                <div class="col-md-3 text-right">
                                    <a href="#" @click="removeFromCart(item)" class="text-danger">
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
                <div class="col-md-6">
                    <p class="sidebar-footer-text">TOTAL</p>
                </div>
                <div class="col-md-6">
                    <p class="sidebar-footer-text">@{{ total }} €</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ action('HotelController@index') }}" class="btn btn-block btn-detur">PROCEED</a>
                </div>
            </div>
        </div>
    </div>
</div>