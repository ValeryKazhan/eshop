<x-layout :cart="$purchases" title="Cart">

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
                            <th scope="col">№</th>
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
                                $N=0;
                            @endphp

                            @foreach($purchases as $id=>$purchase)
                                @php
                                    $totalCost+=$purchase->getCost();
                                    $N++;
                                @endphp
                                <tr>
                                    <td><p>{{$N}}</p></td>

                                    <td>
                                        <a class="media" href="/product/{{$purchase->product->slug}}">
                                            <div class="d-flex">
                                                <img src="img/cart/cart1.png" alt="">
                                            </div>
                                            <div class="media-body">
                                                <p style="width: 120px">{{$purchase->product->name}}</p>
                                            </div>
                                        </a>
                                        <x-link-humble href="/cart/purchase/{{$id}}/delete">
                                            DELETE
                                        </x-link-humble>
                                    </td>
                                    <td>
                                        <h5 style="width: 100px">${{$purchase->price}}</h5>
                                    </td>
                                    <td>
                                        <x-quantity-input name="{{$purchase->product->id}}[number]" :id="$purchase->product->id" :value="$purchase->number"/>
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

</x-layout>

{{--<script>--}}
{{--    $.('#input-id').on('change', function () {--}}
{{--        $.ajax({--}}
{{--            type: "POST",--}}
{{--            url: "/cart/store",--}}
{{--            data: {--}}
{{--                0: $(this).val()--}}
{{--            }--}}
{{--        })--}}
{{--        --}}
{{--    })--}}
{{--    --}}
{{--</script>--}}
