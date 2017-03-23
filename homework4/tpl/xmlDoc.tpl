<div class = "title">
    <h4>
        Title
    </h4>
    <dl class="xm-title">{title}</dl>
</div >
<div class="address-vraper">
    <div class="address-left">
        <h4>
            Shipping
        </h4>
        <dl >{addressShipping}</dl>
    </div>
    <div class="address-right">
        <h4>
            Billing
        </h4>
        <dl>{addressBilling}</dl>
    </div>
</div>
<div><strong>DeliveryNotes: </strong>{DeliveryNotes}</div>
<table>
    <thead>
        <tr>
            <td>PartNumber</td>
            <td>ProductName</td>
            <td>Quantity</td>
            <td>USPrice</td>
            <td>ShipDate</td>
            <td>Comment</td>
        </tr>
    </thead>
    <tbody>
{rowItems}
    </tbody>
</table>

