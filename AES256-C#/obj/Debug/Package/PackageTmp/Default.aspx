<%@ Page Title="Home Page" Language="C#" MasterPageFile="~/Site.master" AutoEventWireup="true"
    CodeBehind="Default.aspx.cs" Inherits="AES256._Default" %>

<asp:Content ID="HeaderContent" runat="server" ContentPlaceHolderID="HeadContent">
</asp:Content>
<asp:Content ID="BodyContent" runat="server" ContentPlaceHolderID="MainContent">
 
    <asp:Label ID="Label1" runat="server" Width="200" Text="Keyphrase:"></asp:Label>
    <asp:TextBox ID="Keyphrase" runat="server" Text="TextToEncrypt"></asp:TextBox><br/>

 <asp:Label ID="Label2" runat="server"  Width="200"  Text="Passphrase:"></asp:Label>
    <asp:TextBox ID="Passphrase" runat="server" Text="test"></asp:TextBox><br/>

<asp:Label ID="Label3" runat="server"  Width="200"  Text="Salt:"></asp:Label>
    <asp:TextBox ID="Salt" runat="server" Text="4Bvq75DG"></asp:TextBox><br/>

<asp:Label ID="Label4" runat="server"  Width="200"  Text="Iterations:"></asp:Label>
    <asp:TextBox ID="Iterations" runat="server" Text="1000"></asp:TextBox><br/>

<asp:Label ID="Label5" runat="server"  Width="200"  Text="Init Vector:"></asp:Label>
    <asp:TextBox ID="InitVector" runat="server" Text="pOWaTbO92LfXbh69pOWaTbO92LfXbh69"></asp:TextBox><br/>

    <asp:Label ID="Label6" runat="server"  Width="200"  Text="Keysize:"></asp:Label>
    <asp:TextBox ID="Keysize" runat="server" Text="256" ></asp:TextBox><br /><br />
    <asp:Button ID="ButtonEncrypt" runat="server" Text="Encrypt" 
        onclick="ButtonEncrypt_Click" />
    <asp:Button ID="ButtonDecrypt" runat="server"  Text="Decrypt" 
        onclick="ButtonDecrypt_Click" /><br />
    <asp:Label ID="Label7" runat="server"  Width="200"  Text="Result:"></asp:Label>
    <asp:TextBox ID="ResultText" runat="server" Rows="4" TextMode="MultiLine"></asp:TextBox>
    <br/>

</asp:Content>
