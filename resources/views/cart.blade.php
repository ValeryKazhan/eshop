<x-layout :cart="$purchases">

    <x-start-banner
        :header="'Shopping Cart'"
        :pageName="'Shopping Cart'"
    />

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                @if(count($purchases)>0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>

                        </tr>
                        </thead>
                        <tbody>
                        <form method="POST" action="/cart/store">
                            @csrf
                            @php
                                $totalCost=0;
                                $№=0;
                            @endphp

                            @foreach($purchases as $id=>$purchase)
                                @php
                                    $totalCost+=$purchase->getCost();
                                    $№++;
                                @endphp
                                <tr>
                                    <td><p>{{$№}}</p></td>

                                    <td>
                                        <a class="media" href="/product/{{$purchase->product->slug}}">
                                            <div class="d-flex">
                                                <img src="img/cart/cart1.png" alt="">
                                            </div>
                                            <div class="media-body">
                                                <p style="width: 120px">{{ucwords($purchase->product->name)}}</p>
                                            </div>
                                        </a>
                                        <x-link-humble href="/cart/purchase/{{$id}}/delete">
                                            DELETE
                                        </x-link-humble>

{{--                                        <x-link-button href="/purchase/{{$id}}/delete">--}}
{{--                                            Delete--}}
{{--                                        </x-link-button>--}}
                                    </td>
                                    <td>
                                        <h5 style="width: 100px">${{$purchase->product->price}}</h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <input type="text" name="{{$purchase->product->id}}" id="sst{{$id}}" maxlength="12"
                                                   value="{{$purchase->number}}" title="Quantity:"
                                                   class="input-text qty">
                                            <button
                                                onclick="var result{{$id}} = document.getElementById('sst{{$id}}');var sst{{$id}} = result{{$id}}.value;if( !isNaN( sst{{$id}} )) result{{$id}}.value++;return false;"
                                                class="increase items-count" type="button">
                                                <i class="lnr lnr-chevron-up"></i>
                                            </button>
                                            <button
                                                onclick="var result{{$id}} = document.getElementById('sst{{$id}}');var sst{{$id}} = result{{$id}}.value;if( !isNaN( sst{{$id}} ) &amp;&amp; sst{{$id}} > 0 ) result{{$id}}.value--;return false;"
                                                class="reduced items-count" type="button">
                                                <i class="lnr lnr-chevron-down"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>${{$purchase->getCost()}}</h5>
                                    </td>

                                </tr>
                            @endforeach


                            <tr>
                                <td>

                                </td>
                                <td>
                                    <x-link-button href="/">
                                        Add Item
                                    </x-link-button>
                                </td>
                                <td>
                                    <x-link-button href="/cart/clear">
                                        Clear All
                                    </x-link-button>
                                </td>
                                <td>
                                    <div class="cupon_text d-flex align-items-center">
                                        <x-submit-button>
                                            Save Changes
                                        </x-submit-button>
                                    </div>
                                </td>
                                <td>

                                </td>
                            </tr>
                        </form>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Total</h5>
                            </td>

                            <td>
                                <h5>${{$totalCost}}</h5>
                            </td>
                        </tr>


                        <tr class="out_button_area">
                            <td class="d-none-l">

                            </td>
                            <td class="">

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <x-order-link-button/>
{{--                                    <a class="gray_btn" href="#">Continue Shopping</a>--}}
{{--                                    <a class="primary-btn ml-2" href="#">Proceed to checkout</a>--}}
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                @else
                <h1 class="text-center">You have no items in your cart now</h1>

                <div class="text-center mt-5">
                    <x-order-link-button :href="'/'" :name="'GO SHOPPING'"/>
                </div>

                @endif
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

</x-layout>



