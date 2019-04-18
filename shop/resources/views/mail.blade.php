
    <div class="container">
        <div class="row">
            <h2> THÔNG TIN THANH TOÁN: </h2>
            <p> Họ tên: {{$name}} </p> 
            <p> Địa chỉ: {{$email}} </p>     
            <p> Địa chỉ: {{$address}} </p>
            <p> Số ĐT: {{$phone_number}} </p>
           
        </div>
         <table  >
                <thead >
                    <tr>
                        <th style="color: red;"> ID sản phẩm </th>
                        <th style="color: red;"> Tên sản phẩm </th>
                        <th style="color: red;"> Số lượng </th>
                        <th style="color: red;"> Price </th>
                        <th style="color: red;"> Promotion Price </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($product as $pr)
                    <tr>
                        <td> {{$pr[i'tem']['id']}} </td>
                        <td> {{$pr['item']['name']}} </td>
                        <td> {{$pr['quantity']}} </td>
                        <td> {{number_format($pr['item']['price'])}} </td> 
                        <td> {{number_format($pr['item']['promotion_price'])}} </td> 
                    </tr>
                    @endforeach
                    <tr>
                        <th colspan="3" > 
                            <div class="d-flex justify-content-start"> Tổng tiền: {{number_format($totalPrice)}}  </div> 
                        </th>
                        <td> 
                            <div class="text-danger"> </div>
                        </td>
                    </tr>
                </tbody>
            </table>
    </div>
   