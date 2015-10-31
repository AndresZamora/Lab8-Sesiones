<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    version="1.0">
    <xsl:template match="/">
        <html>
            <body>
                
                <h2>Preguntas</h2>
                <table border="1" style="margin: 0 auto;">
                    <tr bgcolor="skyblue">
                        <th>Pregunta</th>
                        <th>Respuesta</th>
                        <th>Tema</th>
                        <th>Complejidad</th>
                    </tr>
                    
                    <xsl:for-each select="assessmentItems/assessmentItem">
                        <tr>
                            <td><xsl:value-of select="itemBody/p"/></td>
                            <td><xsl:value-of select="correctResponse/value"/></td>
                            <td><xsl:value-of select="@subject"/></td>
                            <td><xsl:value-of select="@complexity"/></td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>