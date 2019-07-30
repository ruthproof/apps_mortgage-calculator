<!--
**table.php
* Main page for mortage-calculator app

-->
<table>
  <div class="form">
      <form id="form" class="form" action="" onsubmit="return false;" method="post">
        <th>
        </th>
          <tr>
            <td>
              <label for="purchasePrice">Purchase Price ($)</label>
            </td>
            <td>
                <input id="purchasePrice" type="number" step="1000" name="purchasePrice" class="field right number" placeholder="What's the purchase price?" value="200000"/>
            </td>
          </tr>
          <tr>
            <td>
              <label for="percentage">Down Payment (%)</label>
            </td>
            <td>
              <input min="0" max="100" id="percentage" name="percentage" type="number" step="1"  class="field right" value="20"/>
            </td>
            <td>
              <label for="downPayment">Amount ($)</label>
            </td>
            <td>
              <input name="downPayment" class="field number" id="downPayment"  type="number" step="100" name="downPayment" class="field right"/>
            </td>
          </tr>
            <tr>
              <td>
                <label for="interestRate">Interest Rate (%)</label>
              </td>
              <td>
                <input min="0" max="100" id="interestRate" name="interestRate"  type="number" step=".01" class="field right" value="5"/>
              </td>
              <td>
                <label for="mortgageAmount">Mortgage Amount ($)</label>
              </td>
              <td>
                <input name="mortgageAmount" class="field number" id="mortgageAmount"  type="number" step=".01" name="mortgageAmount" class="field right"/>
              </td>
            <tr>
              <td>
                <label for="period">Period (years)</label>
              </td>
              <td>
                <input type="number" min="0" max="40" id="period" name="period"  type="number" step="5" class="field right" value="15"/>
              </td>
              <td>
                <label for="totalCost">Total Cost ($)</label>
              </td>
              <td>
                <input id="totalCost" name="totalCost" class="field right number"/>
              </td>
            </tr>
            <tr>

            </tr>
            <tr>
              <td>
                <label for="monthlyPayment">Monthly Payment ($)</label>
              </td>
              <td>
                <!-- <div class="dollar"> -->
                  <input id="monthlyPayment" type="number" step=".01"  name="monthlyPayment" class="field right numbers"/>
                <!-- </div> -->
              </td>
            </tr>
            <tr>
              <td>
                <input type="submit" name="Calculate" id="submit"/>
              </td>
              <td>
                <button name="clear" id="clear">Reset</button>
              </td>
            </tr>
      </form>
  </div>
</table>
