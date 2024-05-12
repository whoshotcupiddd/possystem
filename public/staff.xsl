<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:template match="/">
        <html>
            <head>
                <style>
                    body {
                    font-family: Arial, sans-serif;
                    }
                    
                    h1 {
                    background-color: #007bff;
                    color: white;
                    padding: 10px;
                    text-align: center;
                    }
                    
                    table {
                    font-size: 15px;
                    border-collapse: collapse;
                    background-color: white;
                    width: 100%;
                    box-shadow: 0 5px 10px;
                    background-color: white;
                    text-align: left;
                    backdrop-filter: blur(7px);
                    box-shadow: 0 .4rem .8rem #0005;
                    border-radius: .8rem;
                    overflow: hidden;
                    margin-top: 5px;
                    }

                    th, td {
                    padding: 1rem;
                    text-transform: uppercase;
                    letter-spacing: 0.05em;
                    font-weight: 700;
                    border: none;
                    }

                    tr:nth-child(even) {
                    background-color:#f0f6f6;
                    }
                </style>
            </head>
            <body>
                <main>
                    <h1>List Of Staff</h1>
                    <p>
                        <xsl:value-of select="count(//staff_member)" /> record(s)</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Staff Code</th>
                                <th>Staff Name</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Deployment Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <xsl:for-each select="//staff_member">
                                <xsl:sort select="id" />
                                <tr>
                                    <td>
                                        <xsl:value-of select="id" />
                                    </td>
                                    <td>
                                        <xsl:value-of select="staffCode" />
                                    </td>
                                    <td>
                                        <xsl:value-of select="staffName" />
                                    </td>
                                    <td>
                                        <xsl:value-of select="staffPassword" />
                                    </td>
                                    <td>
                                        <xsl:value-of select="staffType" />
                                    </td>
                                    <td>
                                        <xsl:value-of select="staffEmail" />
                                    </td>
                                    <td>
                                        <xsl:value-of select="deploymentDate" />
                                    </td>
                                </tr>
                            </xsl:for-each>
                        </tbody>
                    </table>
                </main>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
