<div class = "title">
    <h4>
        Title
    </h4>
    <dl>{title}<dl>
</div >
<div class="address">
    <h4>
        Shipping
    </h4>
    <dl>{addressShipping}</dl>
    <h4>
        Billing
    </h4>
    <dl>{addressBilling}</dl>
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

