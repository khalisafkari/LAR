Imports System.Collections.Specialized, System.Net, System.Text
Public Class Form1

    Private nv As New NameValueCollection
    Private wc As New WebClient
    Private Sub Form1_Load(sender As Object, e As EventArgs) Handles MyBase.Load

    End Sub

    Private Sub Button1_Click_1(sender As Object, e As EventArgs) Handles Button1.Click
        'Dim wb As WebClient = New WebClient
        'Dim vc As String = wb.DownloadString("http://www.hatinews.com" + TextBox1.Text)
        'Dim vv As String = wb.DownloadString("http://www.hatinews..com/K/H/2.php?e=" + TextBox1.Text)
        'Dim vb As String = wb.DownloadString("http://www.hatinews.com/K/H/A/3.php?e=" + TextBox1.Text)

        'TextBox3.Text = vv
        'TextBox2.Text = vc
        Dim user As String = TextBox1.Text
        Dim pass As String = TextBox2.Text
        nv.Clear()
        nv.Add("user_name", user)
        nv.Add("user_email", pass)
        nv.Add("user_pass", TextBox3.Text)
        nv.Add("numdays", ComboBox1.Text)
        Dim result() As Byte = wc.UploadValues("http://localhost/v/vb/reg.php", "POST", nv)
        Dim resultsring As String = Encoding.ASCII.GetString(result)
        MessageBox.Show(resultsring)
    End Sub

    Private Sub Button2_Click(sender As Object, e As EventArgs) Handles Button2.Click
        nv.Clear()
        nv.Add("user_email", TextBox4.Text)
        nv.Add("user_pass", TextBox5.Text)
        Dim resutl() As Byte = wc.UploadValues("http://localhost/v/vb/index.php", "POST", nv)
        Dim resultan As String = Encoding.ASCII.GetString(resutl)
        MessageBox.Show(resultan)
    End Sub

    Private Sub TextBox4_TextChanged(sender As Object, e As EventArgs) Handles TextBox4.TextChanged

    End Sub
End Class
