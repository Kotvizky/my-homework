<div class = "title">
    <h3>
        Title
    </h3>
    <dl>{title}<dl>
</div >
<div class="address">
    <h3>
        Shipping
    </h3>
    <dl>{addressShipping}</dl>
    <h3>
        Billing
    </h3>
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
            <td>Comment</td>
        </tr>
    </thead>
    <tbody>
{rowItems}
    </tbody>
</table>

