<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<style type="text/css">
		p {
			margin: 5px 0 0 0;
		}

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
			display: block;
		}

		.bold {
			font-weight: bold;
		}


		#footer {
			clear: both;
			position: relative;
			height: 40px;
			margin-top: -40px;
		}
	</style>
</head>

<body style="font-size: 12px">

	<table width="100%">
		<tr>
			<td width="20%" style="text-align: center;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAV8AAABpCAIAAAASg7fSAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAgAElEQVR42u1dd3xUVfY/503JZDLpPSE9IQUSSOgh9A5KkaIoXZri4tpQ97e76lp2115AQZEmiAiI9NAhoYSSQBJCIL2S3nuZd35/vDJvkgChqIu884EPJPPem/vuPffcc76nIRGBTDLJJFM7YuQpkEkmmWTpIJNMMsnSQSaZZJKlg0wyySRLB5lkkkmWDjLJJJMsHWSSSSZZOsgkk0yydJBJJplk6SCTTDL9iUn5MA6aCAAIAQgAAAEIUPwf9xcRiAAQUV5jmWR6hKSDIATI8CNxUgMBgYgQ+V8AyNJBJpkeLenAEWafPHn8jTcJEIAQUOvo0O2pmS69w2z8fGXBIJNM97vBHsYcTSIioMr0jC1jxuobGgkBABhCFgEB1Dqdx7BhY776XKFUyZaFTDLdMz2sqCQCWnl5+o4Zw4ENRKTn/gFqqq1N2bM3L/oMAhCxREQEQARyrrpMMj0K0gEAkGEYExNeVCAiCgAlEQDsmT+/Oi8PAAkIiFgAWTbIJNMjIR24PU/EAq8bSD4BRCB9iz76vfcBWAQgJNnAkEmmR8eygJJrydd/3kHAoAR/RE5ZAACklH37Cq/EgwBPygJCJpnuih4an0UbBaEqO3vvwkX8J5KdTwgAfKyDQqlgGCUBcOJD9mLIJNOfUzrwEgIRAVqbmuO+XVudm0cICBzQwG98JAAG/B6f6Nqvj6Wnp0NId4O9Ia+2TDL9aaUDb0JQ8o4dCRs2ARCDCIQErOEShSJ4zqzh773LBUGIigPK8kEmme52wz0s8Q4sERcAmXP6zN4Fz7bU1fMbn4xAR8ceITP37+cNDk4sGEwPlMMfZJLpT6g7IBABNpSWnP3vRy119cSpAzz+iACESEoTbfjrr3OBk8BHUyMHVCIvKWSSSaY/oWWBQOy5Dz8piosDAKkSgESASIAR//w/j8GDDalXaGSQyCSTTHdFD5FHk+LXb7i6ZWvHKgBB18cf8580SV5RmWR65KTDzQuXLq36hpDahzYRgNbRIeL//qaxspJXVCaZHgnLgiUurwqaaqrP/Oc/tYWFvNPCWDwgYuizCyy6dJEdlzLJ9OjoDgjAAtDJv/09//yFW238gGlTw5YskhMpZJLpAW+//2WPJhHLuSSrc/NaGxpudZnG2kZrbwPAABAAI3stZZLpEZIOvGPyFsoDl6EtXikHNcgk0++KO5CkUFtNQcG2iZMR+Iij/wXpggCWXl7jvvrCzMlJXlQiAiI+zJzPbJdJpt9MdxAvqy8t3bdoyc0LFxCFe/EPfweGkAWCLuHh03Zsk8MbiMTQcpTDwGS6Z7prVJJtaWksK+eqvuL/xkZkkUUCAGitq5OhSTCU6ka5HpZMv6d0IJ2zc+jiZxlAQiL6HzEr+POxy+AIeUUBIDcz/tihr+Pj9iPInhyZfgfLQkAZgKC5pnrXzFkFl+MEN8H/hIAY8q+3ezw7nwEElC0LijqxrqW5Me7i7oryfB+/AYOHzfMLGMhX4CRChjGaPIkRIpNMdy0d2pi12dGnS64m/c+kRRMBdntyuqmN7W1cG48OsURIAMgCMI2NNeeithw5uGrAoKecnf09vMOuxh8mgIGDnzHR6GTpINMDlw56AgTAxrIyLsLgj30HpcZEpdWKjC5zucQTzM0Jm5uV+P3qhfX1VZaWznMWrqyuLvpxw8t9Bzw5fPQScwtbApB1LpkelHTgbzn04kvXd+z8o8AHkZcHrHit74vL7xjsIHXKtkPyBffLn2KHEBEK9S2EV8eiotQNa54vK8vRai1nzv3Y1NRi87oX1SbaOc+ucnDyFtUHbpbuYR6k0ytrcLJ0gOs7d8V8+gn9QaJBPBznnTndGW4WT1QCZKTSgfheF0goVon5Uy52eVneD+uW5+UkqZTqaTPfDe0z8eCezxLiDjw550MP71AEElHqe5gBsTyPcL8sHR5p6UAAWJmZyba2/u6Ho+Gvmb2dxtqmc9KBJAWjJBuA971IClv/SaUDEeVmJ367cm5TUx0CTJz6fwMGPX0ueuupY2snT/9nYPBwNEzAPUsHrhKPHIL16EoHQ4Dz+v4DqvLyfn/hwJ/xhBF/f7PX80s7c1KxxAJAU0NtWVnu1fjDxYVp4kdW1q5hfScyjMLZJfDPrBMTEdC1xBM///hmQ10lAf51xS4X18Aff3g1IyXmpTf2mOls7jkanSVKT42xs3O3snaWpYOsOxAA7pg6PS8m5l62dtvjmog6+P3tB69QKkZ/9qn/1Cl4i5IwXFFJQASi6qriPTvfryjPz81JREMLbxS/ValQzZz3aXDP0bx2YfQ5GAJDjazrtpd1PFeSNhsouedeAAVDiCoCkXQ4fCsw4f9EbVUhrkUQAB458NXRyJVEaGnlOHPexy6uAb/+/E5RYfq8xd9YWjm1ectbK1Pi/AI3qtVfPDNlxtuOzr4cgCF5T+QYre1zDFWBDf9rN2/YZqoIjN+a7ox1iEzepmpY+zXt8E2JAIBv7I4ERiMlfuQi6IIoPE74BQEZ41wkvjBQuwXiP+dmEDuaa9EE5r4boU3IMj0wJfh+s7BS9u3bv2TpbU0AQRggICGjVDr36eUc1stt8EBu0gh5GOziyq9ri4rKU1OQkPj5plutNxKwiGY21ksSE+4MkACUleZ8/82i0pIsAAgIHDxo+DxEJIK83Ksp16Lzc5MaG+sQYPykFUNGLhDXDSVIvmCYoMigHV7Wgb7N30VtAJN7Qf64F5LYR+3ErrgJSfiVQRHguhMjgF7funXjawlXIhFAa2a16IUNOnPbLz96QqXUzFv8taOznzBabugdqxKirOHcVvGxB3/6YUX/gU9NnPY3EMoBt2skYqSYEBEAK0TNGH2LZOna32IQOwQsirffUUZ3+DSjNb3Fm0qOQ27AxuMh4TSRSjLpAWBkagnzZpBTxuLb8ByjCRFmu/18Sr6rrZC9T/HwW1Z/Id5Txv3POSzUwsMzdP58jZVlZW5u7Dff6uvrSRCQrv369Vq6xLqr383zMYkbf8i/eKn9q94LOgEAALnZCZvWvlBdWQSAvfpNnjT1bxpTC05e+fmHDxu5+Fri0R1b/15bW8EdDcL9IkxpWEduORjJWdH2snboKSFXIBeFqlbER6Hfs1FlYGYShkR8x1DuGDN8c/vxIAAxCuWESa8kXDkIhHV1FQd2f/zkrP8sXLbu0w8eP7D341nzv1CpNIJIv/38itgNHNjzcau+ubQ0y/BLoS4wSrZK2wcSwu0yQaijGWUlnIEdCqHbHIdGa2W8pne6n/uWW0kg6fuRsfbVTg3gpRl1tGUQwdjjBJITAch4ZoSvI74FvfE73K9x95vWhhL0S8Ce8+cPfHNF2fWUpK1bM44eqy8uJkAElhABEIm9ef7CBVxpHxgQPGf2mJVfVeflHn1lRWVW1v1DFI3NtZF7Pq2uKCKGgoKGPvHkOyqViajycbsoKHjEUyqT71dxzbWgsqKgIC+Z2p5FvMhXKtVdAyNufVlb7YG7VWNq4e3TW+ATkaXvekZBkAF5uVcryvNPHfuOBD7Rmdn0jZjh5OhnY++BAv9hG24Ryvfb2LpFDJ5zJmoTAqTeiN68fvnS5Zv7hU+/cPbnyH2fPTblTbzDeWxQ8hHw9KkfKsry0Uh0cYITUlPOtTQ3CMojAErCNIllGEVAtyHtjkQoK80pLkgVVCwjma3VWnp6hQHAmagfyopzxk96TaFS423HKe62rMy4+rpKo7PXaE3x1lKKzc1OqCjLjzq+QTocjcZ84JDZRGRj28XZ2d8gBwiuJR437AGSWDUEBKyJic6na792Mg0Lbt6oKMsX1T7pXFlaO7t2CWxoqM5Mi+UEkGjpGI4ehK4BA5VKE3gQPVzuVzronJ01lpYNVVWSaSEUTxUCAgx/4zX/SRP3LX6u4NLF5tpa5HmHT/+2DwzQ2NrknD6NgGyLvjIj6+COF7yGDZ++a/uuZ+aUJCcbTkpjrkQAu8BAoltr6QgAcD3pVGrqOWAAgPH276dSqaXFIMRN4+3bNyhkOPejidrMysaluqpk57a/V1UUirLaXGfTveeY8EGzuF0qXnYm+ocbSVGCXdgGmgACREKlWm1v78GdPENGLVQoVDqdjbdvX/4EBB53oTbms+GRQAAlxZnbtrzR2tQAgBUV+TZ2bra27lcTjrD6Vu6+5GsnLSwcgoJH+vj38w8YpNHoxDOGyPgARxgx9rm4S7sb6quIhZzM+EP7Px89fnnBzZRLMb/06T/N0dkX4XZAkHCUMQ31VccOfc2tanV1SW1tqU5nJxyhaGnlVFqceTb6x5Tk0wbtBUCrtZwy4y1H564d9jk10ZhZ2bjGnNmWcCWyvraC00Fs7dxCe0/s1Xcy97JVFQWnozYFhQzz7RpOvIXCIjHU3nDj2xeAubl96vXTBTdTkuKPcNOh09kEc2sqqDiCvsObxeWlOXGX9ly9cqi8PL+xoRZ5VUDkREy7cQ4ItToLS0snDhgaPWF5YPBwaxvXgvwb58/+nJlxSVTzCMDKynnqzHctrBw6xKu0ZpYAlJeTtHvnuy1NDdw3Obv49+o7xaVLEAAqlWprG9drSScO7f2MP2cQCFClMHl82t88vEIZRnmHA+t3kw7OYWFWnl5NV+IBiCVA4MEUDjdApWL4vz/o0rfvnrnzy1JTDbokL/AgaPpUACpLSwucOhWB0iOP6FuaXXr1Ov/pZ3UlxVO3bzu4dFlu9GnDMW+M0gRMfeI2GiW3zy5f3I38ock6OvlJjD1GalUqlSamWktuMbQ6S63O0qVLYP+IZyL3fiKiBT37THp8yhsC26N4mZ//gG2bX4+L3csQQ0A6c7tpT79nZ+/JXVeQn5x89SQBZKZdrKy4CYBbN74CAGqV1sUtMGLIvJDQ0RJlsa1awf2ytbX5l21vJSedbKgpDwge6uDo13vAE+Y6O41WV1acU1iYmhh/uKmhJvnqyZrq4vNnfoo5s9XGxnXIqEUDBj4lldfSPaPT2QwbtWT/7g8BQa9vPXVsfY/QCWMn/HXjd88fjVw5a97nPIvdCuoTbJfcnMS6mjICAGTyc68VFaTrutohP2fg4Oht7+jdNWjQj+tfvhp/RFS7n5jxdkjYhFsxsU5no9PZTpnxz8BuQ9evXsyNpGtgxOjxyw2vgIgAm9Yun/rUv3qEjQNWtGXag778TXb27qPGLW9uafjHyz04w97RyXfKjLdFdZ8MgAuwLPvrz+8kJR6tqS4FxJDQsWMmvNjmyVevHC64eSM+dn9dXVVdXSUBMED19dUI6Ozq7+wa0L3HqG9XzsvNTgDOb87g7Ge/cvcMudWGsrR0tLRwcnLxb2lp3r39HYaABQrtM3HIiAXcBWq11tm1q6OLb011ydmozYJhhqMmLO8/8MkHG2nyYCwLyZlpgGfVZmajP//M0r3LzukzaotLoJ2KyxA6hIQkbNj41IG9ap05AFzd8uOxFa9beXk9uX/3j2PHN1VUjlv11am337m+61djgQ0o6VbRaWKuxO3zDxx0K6NxwuQVSoVKOrmhvSZE7v1ExG579hpvuJoMFiijUJhqLZGQkAVg7J28A7sPFa1NewfPkNBxAFRXU1nfWB115LtLF3exen1zc31WRlxORnzK9cnTZr4v2rTGCiECUUNj9U+bVlxPOkEAEya9EjF0vkKpFA5vsnPwtHPw7B4ySq9vKSvJ2rLhlYL8G4BQUZa/d8cH509ve3ruJw5OPh2KUTOdjcEE0jcfOvD5nAVfBXQbci3xWFrqed+u/eBOGElDQ/XRyFUAyAASCRghSW9CBFapUGtMzQXvBQvAmJnb3A4r4KF4NDO3Jn7padjIJe3XrbGx5uctb9bWlIQPnoNt7f+OuZVhFC5u3fJzrwFAF49gIy+GoEIkxR/Z88u/K8oLAMnGzq13vyeGjFigVpmSMa45dPQSInbc46/k5V49F/1jekoMShFoYtVqU5VKw0PFSEhgprO+7U4iQERCnbk1h8qbaa36hz9pPFfIoMLMzFIyz6Qzt707j19nNsx9Qws8isK9PQPAcGocgteoUd6jR5356JO64tIOdyMB5Z05q29qUul0RfFXEjZu8hkz2r57t+b6OmLJoXvw9T17Dr6wPHjWLJ2jk7RSgdH+oc5PBiVcPlhSnNmW4fkXADMzK7VG1yYwHAXvoYR/DBr/LVBI3rWAIiBFwDG6vb3n1Kffn/PsKhMTrajRXDy3Y9PavzQ3N2JHT66uLl63evH1qyeBYMDAmYNHLFQoVSJmRUjCuUcKhdLeyfv5v/7o6d2T+/pWffPNvOSvv3g6NzuxQ07Mzrwiti0HgOTE4+mpF4J7jm1taT609zO4fQYuAQAmXjmUlRFLQIQEyJfhaa/mGUWdIN6Ri0lwz3BRLZyCpzWz7PDilpamfb9+FLnvUwkCeLuBKxlVUPBIQCJig0PHShaUuCU5e3rrjxtfq6goACQnJ7/FL2wcMeZ5lUrTvtgRAjDIWNu6Bvccs2DpmgGDn2Z5aJAMFVCEUhsEQMjewY/Al07hdCAiQmQYjanOmC04Xw/3XO5qgNs51v8g6UAA/V5+mQCI11+JgAjRoVv3oe++8+vsuTlHj7HtxsxfB5R2KNIuMLA4IbGltu7kW2+3NNSHv/F6fXHJ/sVL3QYNBICc6KjylJRxq74U3E4Gh7O1r6//5El3Eg8GcAEJWpqbftr4SlVlEZfKzKUzC0Bxh3OLvMcB2rgksR2TSGFqkSl4fhOkC39PYPdhzz6/Xmdhx/cPByYp/uj+X/8rCiYilogf3NaNL+dkXgYgQnjsiTc4g0iMWUZgAJCE5yMoTDS6xS9s6h4yCoXYxfrayjVfzr5xLbr95CQlHBX95pxT/+jBr3z8+rm4BeXmJF6J3Q/GpQGJiIglYrlXraosjD6xAYjhgy+4YIrIVdKJlLj6CblDRPQA3g5H5OeQd/qg4ccOz1tW33Lq2Nptm9/gPYwc0CKM1thtzyM7CAwiMiJ7CE9LSzm3d8f7La1NSOTu1fO5l7bY2LoKLsm2NgtKDg2lShMSOt5Ma+Xg5CMeCcJ/xNAU5g5uETSMRwLIYrvLGImhyKJg7j7YtIb7rlhPoDDVCMvNCE0tIfxvr2ceOZoTFU2IiNA2U0tkZoCu0yY7hgS79O279FqieZcuHoOHzNy/1zYgoOjyFU6gX/5urbmrq++4cUigIBH4JWQYhdqE58lbQepEvn79iASkHzAv59rqL2YXF6VJDjVCY2rncOPBf45LhYvaeJUZ4VNe85QQg+3Iw6vnG28fGz/xVT7vCenC2e0x0T9KgVIA2LPz3cz0WE4Ajpnwokql6fCZjPE3KlUmI8Y8p9VZiXXjmlvqr1092Z7JEPQiTIgAwEBWZlzy1ePjJ77CUuuN5Oh2ZUN5kJ/bb2UlOcUF6QyP3zGcFsJ5KIxtfmFWERA5jkAE5jYWsnQtDNK9nQBHQg7qIgJi2bgLu9evXqRnW4gfKAvt4nn4CevwuwgB8MDuj1h9C7ef/QMGmppaSC5h2jKIsOoMIgB5eYeF9Z/k5hHCoTAip4iyDe/k5ENkuG8BA+bTli0F9mNQ4qOVfM//jnQQxB0CK2o71l5eajNt7Jo1iGJh2lsOOjfqdM7p04xKqdZqEbG64Gbk8hezjh/PjznPyZWK9IyqnBzPYUMIkEXg+YE/iem2/jaWAEP7TnZx85fE2FF5ac7Xn83MyYoXzsA/JuZXpTIZOvLZXv0mE0MAoNe3Rp/cWF6WJ0qt3JzE2Iu7WWIJyUxnPXz0ks4/3NWt24zZ/5ZGDsWc3lJRlttWeycEAEsrR0dnX+IdGxh1fJ2Dk29gt+FXrxzKzrzcgTEJCIREdGDPRwTkGxCOIJlg+P0K1hGSs2ugmbkNCt96PTn6m8+fbqivBMJOBTEYC5tL53fdzLvG8axKpRk55i+dr2+EgMgoAgIGC/rsQ1+W60FIBwYVjJKPw0FAIBt/PwAsS7lBoj51602cczK6S7/+LADb2qpvamIERYx4CxIJIfq9990iIlCpAAIkFgiBUKFSgQGgvpXYIp2Z9fBRSxQKJWfmc7pkfX3Vyk9mrP5yVnNT4x83+QjAjJ/0OrB8tGVpcXbM6a1COCQci1zZUF/DsZl/0OC7SH5AImADgob5+Pbl4vQ486hV3yK9Kur497V1FQhkbes6ZMQCATyiwsK0ivK8CZNXtLa2HNz3WYd+TEK6HLs/JztBZ24zevxfPX17i4tcWVlUcDPld5tEV9eA3v2nIsOIXuqcrMTtW//OAitq8p0WEHhwz4fAhw6QUqnEu7mbWzi/gIEkDZZ7xKWDa9++bsMjWE4xJSKA8NdXnPnvhwIgwAoHlSDfRRSFAAirb+b9+sycM++8t2fBs6n7D5q7dum1eLHaQod85UoWiUoSEosSEkNmPyNA6HpAGrBihVC15Na4NyAghISOX/zCBpVKA4hivWZEyEyP+/rzmVWVhbyByoca/74LgIxKreahS8TYC7sL828QQGtLU/qNGMGnDj5d+wuBp50EixkEUJlokA+jBEI8tO8LEc6QVogZM+Hl4B5jPL3DBMgVDuz5xNauS9+B0zNSzidfPUEERtY7kr61JXLfJwDQu/8T7l4hHh49UYgLra0uLSnK4DA4AvYBN0whA3FDYRHGT3x1/KQVwuuwgGxS/NFD+z7Xsy0kRJRLMQg+/LndUre2NnGnEmcdjn3sZbibit68FEbBCJWlA4+MkQKJi3hgnENDGysqKjMyeO8CCgF6SBoLK629PXJAgZArYNnFTWlqcnXLj3aBQd6jRwFA92dmLoqL8x03nruCA9cyDh7yGTOGh3RRIZgUdKcF421Fb9++y17aamFhzztYBLywIC959ZezCwtS+AMb6XeyM3hfA2jNrMIHz+bBb8DamrKS4iwkPHn0u+bmJsEpxGc7dJZTBWhu1LgXCBgwMvIlmj8CI+T9mGh0nj69gbgDl7IzLideOTJ63HIA5vCBL5oaa9ugvNEn11eW37Sz9xgQ8bRkVIwEfP2tRK0EuyXeaQMU2neit28fIEYYA504smbn1n+2NjdL7xKTnFgAArbNk89EbamrrRSSKrB9wldnbAsUEKg/gXy4b48mAACqrSwFNmade/Vurq2rKyo2srFNTb2GD3cM7eE+KIIkmH/vJUumbv9p/Jpv+q94OeLNN27GXuKeqtSoJ3y3ptvMpxQKBQfe3oyNdendS0jcJqWJWmGq4U3Pzp1OLq5BS17c7OjiJ3gQ+HCestKctasWZKRdFIHM30U4SNyX1MaPKYTUo/7eMWjRQyd5cl7O1fKyfHHdEi9HsgZPAI0cu0yjNed+QUSHD3wJiP6Bg/LzkuMu/ioWzuFuPxa5Ggkjhs6xtnEFauuJTbgcSVIGeaDWGN94ualODL4EQHOdzfwlq4N7jpQmJl26sHPT9y80NtaKEy46GLSmFsi0K3lIAMByK6PVWXp37f+bvMKjIx04JujzwjIUUnn7/OV5QGqzx7yGD2+pb3AO6+U5dMjYL77oMXc2wyjsugWFLV1s4eamUGsCn5gGQFobGzFqDYBGfvTf4HlzAMTsbsbExprbOM69wtzCBxDcwTHWhrHs7N0XPrfWy6e36PPinIHV1cUbvn0uMf7I79aigwwignqGPdbOOCIERFLQPYoH7rXI1tbN3cMQlldRlldXWy5+f25WgkQ0oUqlGTPhr4ygo5SVZF6K2Tl24ksAGHViQ1VloficpPjDra1NXTy79widwM1/j17jpa+Ql50Aos//wc6boAG0tjQV5KeAIYESTUzMnpn/eb8B05BP3kEAvJEctebLuTW15STNhEKKGDpHpdK0GV785X1EDEOAACZqUwdHX6mqIkuH+xDoIrOLsIKEs5uqq9U6nZmDQ8DUaWZODsM+eE9jba1zctLa2wFg1onjl9evL7oSb+nhKXZq4R7hGBxMfKV8Upqa9Jw/n1cliSTukrswCy2snOYuWhXcYzTnx+SAEASmqaFux9b/q6spx9+PGbiTG7q4Bwmcb9DFRaVZokt0frPxwdhanaW1rSsfXMIHLKHxKYyuboFOQsp2+OBnbOzcideh8NSxta5dgnr1mVhWmnM2egvnQmttbY7c/4Ver/fw6Gmms+YWwdWtG+c+BCLiUVYDdwmYxQMA8nlPnhhiJAaqIQIAg8onnnp/2KjFSqVKnL38vKTVXzzTwBtHhsATNEQp8WBEfu41vqAEop7VN9RVwH1kCRvhI/QISwedi3OXiHACrpaBEMYhCVOqLShQmZlZenq0NNQXXIqtKy7R2tuLG0FhYuI/eaJDcLCJhTkjiTkRvSAARgUVCDBo+nSxx8ZdKA+IiKA1s3pq9n/6DXrKwtJRUL+BABrqqo8eWvU7rSOKbyMo5lzkhlGZEgGzIVb4BDv/dD4Oh6vpQEQEnt5hdnbu3EeVvC5A5hb2OnNbESwYO/EVpULNTVZDY93V+KMjxi3TaHSXYn4pvHmDAC6e21FUmG5ubjd01CLREc/vNGEpWluba2vKyFAQAQAIkQjuW/aiEF5F4sEgmvh8ns/Yx/46YdLrarVWPKBKijJPHl7T0tJo4AJEQNJoLdRqrbB7sXe/KcT1VSOqriq+ErvvvjY2iUUJiR5O84R5EFwOKp2ZuYsLp9DW5OZycbXYNpoQ3AcNUpma9n1xeVVWJqNQiDPmNiBcqdGgguHY7OrWn6CtJQsAoG9uTt65k8Pgbfy7cvExBHAP3nWVWvvEjLeWvviDo6MXMlwQHyHAmVObf6eJJ8O/F85u56s1CMOANh5zxHI+q7eTWhL/jKbmutq6ct5rgWRh4WCqteCk9tlTm6gjvC+45xhP71AONGVbmiP3fmxn6x4+6JnamrKTR9fW1ZSdPPotEA0ZMZ+Xre0OTASoqS5NvBIppC4zbYyC31Li8vm/AwfPnv70e1qthVik5eSR737Z9nZDY430Br+uAxy5uEYEALJ38uPqyQihowzBfexrQ0L7w6354EEAACAASURBVIpPMg+CywkArby8OD09fsNmJHHj8lSelpp14njCDz/knD5TnZd3beeushs33CMiEjZvBsCEzT8QayhtVJGe2SEaxOrZqqxsQNDa2pmYmwsZ8Pe+frZ2HuMmv6ZUaozU8d9NdRCEQGlJJl8OC1Cj0ZmZ2wJQr75TlEq1EC2L507/CAB30RKZ+DMzPfU8JxuQwNbeXVBIoH11EeLTx2nkuL9oTMy5URYXZcWc2TZwyGwrW5ekxKMbv3u+sqLA1rZL+OBZbb60f8RTxt4BlDiuAQBs7T1+62qTJFGbeoSNn73gCwtLB7FGReyFX7ZueLm2uqytESY4cm2sXRRKFSP8uqw0G+//BCC0sXd/SMGLB+KzAATq/swzxBff4lMXhIoUBATWPj6+48blx8SU3UitvVnYa9HCGbt3eQwfplCqAKA6O4uEwtYliYkFly62PV6FCG2O71z797fx9UGpptnx4oiR9sQSa7xCPEMEdR+hs7A1qKm/1yLyjhtg9PqWsrI8Aj5qMyh4uLdvHwCwsXFVMAxxyftEjQ3Vly/thfb+/jtrJ0IKBUC/8BmSYphcyT4KHzRLqDbHcEa8t2+fbj1G8oIX4Vjk10qVeuiIRU1NddmZlxGZ0Y+9KFTQMZCdnZuwDVFIo2akkrB/+JPAxSeLgSV0GwHHSl+SeKXkDvIRQYx3ByD08Rvw7NK1NnZuyAXFEl6/FvXDuhc5nuArsjCimYchoWM0WnPx0Dl/dttdSTNxYVhu8PwsQ//wGWAwDEm4kmXb5YAY/VK4RWDje6kOzRqFePwxPgsEAKVabeXtBQTpR46aOTo6hoQwgsd4xu5fpu/c3nP+3PAVr7n0DWttblbrzBx7hNj4+Jq7OBfExrr06asyMytKiD//xVfH3vxb0PTpIm+XXb/BMXPPRfOvrF3PLb5dgL8h+Pw2uCRBXm5SZnqckBOKHal9EDF4Lh9iDwi/HybJBx00NNRevRIpJNxQn/7TxI8jhs4B5IqCgV7fcmD3x4KrvhNiDAkIok9uBMEDZGvXRbCxqaGhJvbCr4SIwFhbu4r2CG+SAwwdsdDcwpbbj9XVxaeOrQvt9ZibW3dA6OLeLbT34+1VOxJgIG4Ko09tbIetiBgfy8u8W7+FIUuRT71DR0cfhmFub0+hGJDEZ9WQs2vXpcu3OLr4C9YW5mZdOXTgC17yEaIxI0UMmSPCZ60tzXt3fcCyrXe7IcSaCyiKWGQAgIAVcjXFKgDt180ARXMXOzv73vvhfX/u+fvHHfhJV5vrBrz8EoPYVFGuUKlVOi0hsEA95s5xDuultbPPOXPW0sPT0s0jcunzZk5OnB8iO+q0c68wn3FjzRzsHYNDAqdPayivMHNyFLnq+o7tnAVh5uRcV1jAAlh6ewXPmd3J0TU31R0+8CXdqqQhIRL0GTDV0dmPV62J+X1kg7hxCvKSScjk8/Lp7SaUG0CAQcOftbR0JGS57KCqquJTJ743JCXdQUAgIlZVFgMAQ0gAC5dt0Jlz1RyQZVtra8oEV2ZbK44AHJ39evefhoK341zUj7W1ZSPHvUAEzi4Bt6wVRQzvGSGoqSgWi6dyf5VKtYOjt1DNDk8fX38nB5NhXIQUEjZWqVR3XrsT6wVZWjouXb7Rx68/JyD0+tbjkV9/+sFjzc2NbcQTAXh69zbV6DjkRk9s9PGNuVkJ0C5u6tZbARsbasq5fBYhYVCrtbSyduZeh0WIOrFO0IU7zgk2pHUCAGBY3ykA7D2ZZIan0R8jHQxuNvSfMsUxJJiAufTN132efx6IGGBMbW2AwUurvjZ3cS2OT1ColJ6jhgNASUICIPRZ9lxTde2lVd9wiGZLTXXQUzPcBnCBDMzVH7c2VFQSol2gv31gYPIvu5DAY9Agra1t54dXUpxRXpoDxqnI/PQDEUJDfVVLcwNf/Na92+8GShJAY2P10chVXO0vW3v3ydP+oVZrRMmo1VpOe/o9nZm1kINHxw+trq+r5F/sTuySkXYhNzueO7AiBs+2sXUFQ7Agzy/de4yys3dvq68jAED4oKdt7dw5/m1sqN657S0nl66B3QbHXvi1ID+5vfbSd8B0MzNLwSfA2S2soCIRAZhozAK7DwPet8EWFqRVlOff/gwmoPycq1wsxsAhc+7e5uXHqDWznrt4pZ29pziYosJ0IrZdXjR4+/bpFjKS0/0ZAERct2ZRdWVJ57+3qqooI+2CJBWNbO3c3D1DRGmRm51QW1chxF9guzFwEhbycpMAyc7evXuP0QDM3dQx6eBp+blJf5DPQtIkwG/i44hUcjXJ2s/Pe+QoVCldB/SvSEnJOXNGpdEQUeaJk6M/+wwAYlev3jn9qRu791akp7sNioj79jsEsPTw6P3cUqVWq29sLEm61lRdxer1CNT/tddKkq4111QhYp/lL1Cnh5aTHV9TVXzq2DpOjeNTeknqWqMzUZvLy/I4aRESNg6ApAYhGer8GCzANoYc8eclidXGBftTb3yZ8JcIgK2pKlm/ZmlmeiwAObv6L/7LJmeXAEF54c0l/6DBPXpNEGMeGxqqt256raGhSjgQhBADiXlJxAKwJcWZu7a93dLSiAi+fv1HP/YiIiNqHMcOreEOOo2JVqFQCXGbLGepcoO0sHQYPGKBWLE1PSUmPm7/uMdfbdW3RO7/nNW31bdNTS1QwYgTxur1eXlJoqbDAALg8NFLeOEAUFGed+bUD4KN3bFhXFVREH1iIxJ4eIVqtZaCsswXmCCxMnfHtyMvqRgAABMT3bSn37ewdBBWk25x1tGUJ/8VMXSuuOKNDbU/bV5RU10qWXhqhzWw4gcnDq8WTFQUgA0cMfo5saBZbnZifOw+vG2cVVFh6oVz24HQy7e3RmNmXOEFDMkyIgBNYphvB88sLki7eG77H4JKGlluIXPnmlpblyXfSN75y9AP3rcLCNA3Needi9E5OlblZBfExrXWNXAmFaMyGfDaKzZ+frFrviuMiwue9TQAKDUahUp188KFnFNRjRXl9sHdlRpT94gIx5DgS6u+JkLHnj20NjbY6fM58coRAIq7uDs/J4nrfiAenpzqevNmyqWYndyeNjOzHjjoGTIOP0Zu4wNL0oO3/XfxpTKJgKqqCrlTsZ0PhFheNFBpce53qxZkZcQCgodP6HMv/mRl7SiGbkgqDsBjU94YNe4vojGaeu3096sWxscdFPOIJDHLrFBKjIk6tq6oKA0ALK2d5i9drdGYS0fe2FAtVl4iQ9gaCvuG/zms90TXLoGC8Urnon9UKtV9+k+9nngyLeV8+0nw8Ootxojr9S3JV08AsGI4CQBoTC1Gjl0mekyiT228GLMTxbrd7XTSmNPbSoqzNBrtqHF/aQO2krCIl+P2FRdlgDGKYVyGg5dQXj5hC5ets7X3EMV5e4ZBAJVKHTFsrp2Dh4DfYHpKzNpvFlSU57XDe6XKKAFQ1LHvEy4fEhy7QhogopOLX5/+T4j48L5d/029cRZvjYMfP/xtfV2lpZXj4GELOlQxxNcXIeeMjDhoHzhMwAJmpF+oq624h92tePvttx+kC0SpLIxPqEhJqcrM8p88yb5bkNfw4axeXxgX13Xi49beXnsXLIhdvQYAVGZapUbjOXyY19AhTmFhSo2ae0LSTz9beni49u9j6e5u4e4ev37d6M8+zTxy7NqOHYxKOfLjj6y9vAg728bj/Nnt1VUl+tbW2Au7FCq1a5cghYLL+0Y92xp9fN32LW82NNQCgU5nNWfxKls7D7EHHyA01FefPrURhCoj/cJnWAqlhMG4gmvytZN5OQlcQYGG+urGhrqqqkI3j+D2qVM5GVfi4/b/su2f5WV5gBDcY/S8xd+oVaZ8uCmwRj1XEBhUODr5pCRH19aUcSZHdXXR1fjD5RX5VtauFhYOEgZjCCEz7eLn/5mUnX0ZAHqGTXj8ib9Z2bii5Ditq6uIPrGhproYAJ1dA7uHjOCLSBFfSEXcUYxS3avv5OyM2IryfARsaKxNSzk759mvMjIupKddDOk5Ruq5IIDWlsZrCcfEMi9KhapHr8cYQ5EXBCAPz9CSooziwnSuLHFGSgyjULp5hDCMQjqfp45/v/n75SnXT5tb2M5/7jsPr1BB2vJ/mpsbTh1bBwCkZ/tHPGVmboO378BOAIjm5jbBoWPTU2JqqssAwdHJt0fYuHbyAU1NLfoOmObk6l9TVVRVWUgANdWlF85sLy7KsLBytLRyxLatDPD0qY2b17+UlHDExt79iRlvMYyiTbsaX98B6RkXqioKAQiIzUi7qFCq3DyCpZc1NdZGn1i3fs1z+dlX7R09Fi5b5+DoxYfCGDMSAmSkXUxPPY9CQEVJcaZCoczOjMsS/mRnxGVnxuVkxh3e/9XT8z6R1hDtPKj5IFF6Irq2ffvhl17hzIR5Z6IB6My//xv++goAit+w6cwH/w5bsqjfSy/FfPSxy4D+nkOGEGLOyZMKU02Xfv0N6yg8MOvYCUDYPXc+sXq1qenzaSntd+ZtBpN249x3K+eRUH9MqVQREICCO2Zb9S3clhg1btmw0YsVCrUEY6fqqtJ1axYV5CWLAJOtvefgYfP7D5wh1PXix3Dh3I6dP/2T2FZD/ykAAFIo1cbaGQEAsayebUZQWNk4L1iyxp6D4smoRphRcyQWAIHVt7LUeuzQ6tPHNzQ3N3ABvwyjQAaFXlL81+rZVpbVDx42L2LYPEtLR6FUGwMAxYXpVxMO1daUnz71g3CyMeGDZul0NhqtRfigZ9C4jyGHq2dlXF779fzm5gYu9nzKk2/ZOXitW/Xs5Cff7hc+Q3y3rIy4dasXNjRwBSkYjrlGjl2mUKqB2JCwcfb2ntz0six7LmpL1MkNleX53NcwSnWbBdW3NhIw/Qc+OXj4fDt7dyIGDSVlqa62IurE+hOHv+Va9Dk4+yx47jsbG5db6cJtemG1tDR+/83CzNQLwWHjZi/4UuoCbIPPsnr2+JFvbubfSLpymBgAAgWjREYh1Rm4Uvktrc2c4ebg7PPym/sRQVoLihsAy7YeP/xt9Il1DQ01CICgYJQK4y6ArF7fQgRDRy0cMnyhmc5a7I4orWdFxN5Ijj519Pv01BgCSXVw7CjcAhgievOdYza2bn+4dAAA2jR8RHlKCgD4jB792HdrLq1Zq29qqM7KKb6WFL7i1dhvVnuPGn32w4/Gfb3SzMFBZWZWV1CoMDXt0r+fcHAZ9klRQsLuWXMaysoIQGVu/sL1aywfRst0YjAsASTEHigtzQaiY4dXt5k8L9/e3j69w4fMNjW1EKqnIQFbkH/j2tUTROxt2mSMGP08AMSc/qm+rvxuZ9DVvXtA4OD2oVEddXMUEkokTZDKSrKjjm+4eH5Hm/aSZubW/cKfRER3z1Bf//7Gdg0R4NnozY311R0OSWNqET54ligdEI38kAV519etXlxVVQxICoViwdK1pqbme3f9Z+bsj6xsXLjnZ2ZeybwRQ+17C3Bj01n3j5gpPW2rq0ouxezUtzafPLZWIhx5GjHmOSeXrkHBIwyNxhA4AZcYf6hjdRyha8AgN/fu7c8PPlPHuJHUiSNrKyvyn3jynXb8CygalAJVlN+Mu7irubkx+sT6W3nQHRx9IobP6917kgGJM+rzLqAARekJVw7V15bHnNlGxvWPTTXmA4bM8vbt7e0tNjoBaa9M7tC6dH5HJ+ODUchBHzBktpnW4g+WDhxtHDa8PCWFs4Gc+vSa8sPm3DOnI//yYvenn474x98ufPa5vrGpS0Q4ozax9fVNizxk6ebmOXyocQNCAMDsqKh98xe1NNZz0zP8/fdC5s0x+OY75dTSi20ajc5koTgiX7nQiJNYI7fjLVszsm3ch53RZfg9QJ1Vf9o+gSW+617bsRktIxl6s/F6EALD/3O7fp8c1smipE+k8GgqL81d/+1zxQVpHKwwc/aHrm7df93xzmNT3nBxCTTUBDb0jW3TabItTmNUI76DPpp6AReju5leQ9TcrRdOTG7v9CpwSoVkWm/bblOURLfvyimJB4A2QoSPJeuALYV56+yEAN2Rk/8g6cAptAT2gQETvvuWUSobKyqUGhMzV9ei2FidkxOjVldmZtp3C6ovLbcPCgRjKDhlz57IZcv5DUwAQEPff7fHvHl3wy4AYgsUodipRK0Qyybdur/rrXuHtOl62rnxsJINgffeZVfMUmvXXNu4xTlJWufgnYQdSTytaKzHcv0poLamPObM1hNH1rY01yPiuImv9Qgdm5URG9pnknRUt+5DS1xtLul4+ErmPMczRnJQGotxF9Mr1irslJXRqYVrN7233vZ0xzOj7Y6TND8Tn0AASIz0DVjSd2YdO5gQsbsU3rUL4gEH/xiKpwhl4BGp5HryhkGDov71r9amRpuuXcuv30jcvMXUzj5lz77cM2duxlyk1maxVpK+ubm2oPDyd2sjn39BbDlNIDIL2/mEWCG1t8PW7Sg2m2hffJ6/6/YBKCRptNe5fS6G6zHI3NccdxDAhO2sFDHyQMSxqRNP7ihrhVd/UWduO3LsCwuf/75nn8c1GosDez7c++t/rGy7tGsvju1mWgy4JzTOqUWea9vNNt59bwbJF90pY8aoTlSnplwqGm7ZoQek1dbx9s/rYO3aM6fRWt59QhHy9xHAPUZTPVDdgSUWATcNG1GecsNoGgkQQG1p4TN2jNvACK/hQ02sbRCgKCEeAR1CQgCoKifnyvfrK9Iysk+eFM4Zkj5hwCsv93v5pdufDDL9pkRCSEdJUfpPm16rqS5tbq4P7fX4oOHzbe3cSMAr7qLInUz/w/TAUUk2dd+Bo6+91lRdLZX9xHnbhJPIxs/XoVsQie3QAAghde9+atUDEhGDwPIanaRzMSqU41av9Bs/ATqHSsr0G0gH1lA2ErC2tjQx9uC5Mz/V1pSNHLvMz3+AjZ2bUql+sN0cZfqTSIe6kuJNQ4Y3VlYIto5Ud0AjXU4CIBEwDF+jCYWmCsg3XDTWPqz9/J4+dEBpokGUme+PkQ4kttEmQzhPYUFq7IVf026cm7XgC1s7N1l3+HOQ8sE+7tr2X5oqKzkftlHuCkpDkrkK1SSEzCEKGBSJ1dK4YLO2DIblqWmk1z/Earmh8ZTEY0bSvkd38zgJntA5cUlGxRUNPj6hpycYGarYQZKWmP0lqnVIQE7OXSdMWmGow9MWwcB2NncHja3uC+7ii1N0EqsWB9DJwnBGfmVEeERk3wOWDl0nTsg/d7alvpETDQ9wCjmPtWu//kqN5mE+fFniEmPa7hUUK8jxLRI7gZQJsEyn23kJSdZcc0BiWb49HJ8GKvQ+FuJoSGhuZoh2NCgF0oggNBgdJHSqlXYVReONLAzl/q0P6lzP3nayhMQaONBZ5xdJpfIjork++FhJAxiM+ABnkXPPiIGID+P6SP1VmWmXXFwDNKY6cSGqqoqKClLc3INNtVa/kTe7prq0oiLfzT2Ev4moXeo2tlFO+JDyzvrPRBmHxcVpCoXK1s69rcMYCIhqayvKS3PcPXve5zqWleWWFmd5eoWpTbSd1h3I4OftbFhd2z3yiIiH3wjb+y1afaBE7X1Ii4gbhr39h9dLijOln6VdP7v264U38290/nEnj609fze5d5npFw/s/kjUPMQ1+mXbWxu+fU4QGOLZjscOrVz58Yy7mustG1/Oy00ChLNRP8Zd3NPRkY4EmJeduHvHe/fPJImXD33/9bPlYn5UJyhy36eJlw8Z7KROU252QlVFoYw73N8WJmxvbD5YAfHwamr8eQVIYt8I4xNbxGWFwrHQNpBaQpXlBS3NjQYwp03ZalGxMG7yjgjE54nzDy0tzszMiIuP298jbIJ4dVlp7umTmxrqq0GSKN3mADVU1Ue+gHxRfmpzYx0ADBu1hFEwHZ69COTl23vm3I+5DxC5fiUEQmsu5BuTg6HfmQRiMTq3URIWKa1Fh5IgBSS+IxunbpTkWIr1cgmo40nj3heEBB0AgqORq4J7ju3df4oEOpGWaQHENnP+0PttlA+a/X+rGfkT6HJiNBT3I0tGu5YV5IZYnOVK3H7S63Xmtn4BA7lrigvT6htqrG1c0lNjTNRmfNHa4szc7ERA8PLta2XpJPJ48tWTDQ3VAIybR3c7By++hgKhZC5RxC0ihs45sOfjkLDxQl4DnYnaZGpqWV9fBcACMQRsfV3l9WunAcnZ2d/ZtatgQVJ25pXy0hxCDO45RqxVVl1VrFKpzc3tALCmpjT1+hkEcHHr5ujkAwBNjbWlJdl29h56lo2P3dcjbML1pJNNzfUajXlQ92Fc2UdErKosSks5D8i6ufewc/DCW+uoiJiRdlGns2nVtxTkpyCSf8Agrc6KG2JRYerNnGRA8A0IF+8tKc6srSnz8unNXZOfdw2IXLp0Q4TU62drq8sAyMk1wMnFD4m5kRxdVVWUnXXZ3SPYwckn/nKkg5PPzdxk7rxydPZ3cfXnBHRjY03q9XPde47Gh188KEGmP4iSE48V3UwRkbGsjMviKdvS2vTJB+PUKq27V8/6+qqDez+bOe8je3uv5GunrsUfUWvMLa0ctForIIw+sfHMqc0+/gPSU88jMlOm/SM4dAwBfPXRVFt7d7WJtrmxYf+v/3526Vpnt8Db8KqtnZupqeXNvGuuXYIAoLq6tKa61MunV1lZLpdXHnV0XfSpDQ4O3lY2zru3vztw8DOjJ/wVAHb8+LekxBPdgkcUFNyI3PNpbXUp98DYC7vMdNZOzl0B4ecf3sjJTgjuOerCuR0VFfnLX915M+/6kQMrA4KG6Fubt21akZ56Pivtkqdfn4zUmCMHVy5/bSciJF459Ov2d7q4B6tNTPfu/HdAt6HTZ76PCuWtXuJs1GYCTEs+HRgyoqqy4GzUlmcWfG5l5QSA33w+S2tm5e3TO+rEupLiLG/fPgCUlnIuIyXGy6c3J0zjY/cDkatbUGVF0ZGDq+wdPYHg4vlftFqr6c98kJ+TVF9XUVyYXlFR4ODk++vPb4f2mdTYUIsAWZmX7e09Zj37hUKhAoCr8UcTLx8K7jlGtixkunc6fni1mCol9uDmWP9Y5Cozrc2zz3+nNbNu1bes/2Zx1LH1U596BwgyMy+PnfDi8DHPEcDu7f+yc/ScteBLS0vHhvrqHze8dGDvR8FhY3IyrvSLeKp3vycUjJKl1h1b/p6UeNzFLeg21ce0Zlae3mFJicdduwQBYGlRZrfgkSnXo7mszdLijOiTG7qFjHx8yhtKlUl84MGdP/2z78AnraycamrKR45dNnDorObGhsyM2K0bXxHSO1kkZBFuXD3R0tL42j8idTqbpsa6g3s/zkyPVShVgHzNF0Ig0i97dbtWa5mTFb/+26WcOnNwz8f9Bjw5YtzziEx1VdEP37+YlhbT1T/iNlN6/erxFW8dMTe317c2r/x0RmH+DSsr5+OHvu4RNn7c4y9pTC0KC1I2fbdMzCkxeFbQYMadP/OTvrVl+swPAKipqf7Qvs9bW5uHj1manXUluOcY/8BBHGCn1Vo+PuVNALp8ad9PG19NT7vY1X8gACReORQcOoZLNpGlg0z3SIuWrXd1CxKxwSux+3dtfwcQmxrrMtIvFhWkfvjuGI55m5rqb95MnvrkvxDA0cmvT/gMMas5MHCYtbULAGh11n4BA6OOrwcCD6+eHl6hcRd+raurBKCy0hxrG+c7IEEEo8b95YO3hg4dsVCtNj1y8Kshw58VQETKzkyoqSqNu7QnPu4gACBSY2NNeup5W1u3vNyrI8e+AAQqE61/YISFpQMBck0AWSSG4MDuj7v3HKXTWQGAiUY7efpbAHD92ine4GcQAQICBnOF4Uw0Os5YyM9JqqkpORP1w9nTWxCAgGlpabiWcPS20gG9fPtYWNgDoFJlolCoAaC+ruLY4W9mzfvCxNQCgJyc/bq4dZMW4ZDkXvKlX7r3GHX50p533ujbNXBwF/fuEyav4JQCrn6fkEyN3XuM5m4PCR17JmpzUvzRrv7hWZmXK8rze/aaAMD8CUIiZOnwRxFpTM21Ztbiz2oTLcew9fUV2Zlxw0YtHTZqCSIBMEQsw1dmBDeP7hYW9hzWx5U+JIGzA7sPPXX8ewDIyUrY+O1z3UJGmppZAlBzcyMgI6mD2jGZ6awGDZsXue8zH58+BNA1KCLxSqSIB9rau81d/I21tTP/KACGUeRkxRNLKpWaC2+TuAAYoW8pNLc2mWjMJL0thCgIMnSSCAgeLqTSAxeLkZZ6rrm54YVXdjo4eiNXth9YYZfeckqDug/nPJQCzElEbEtLs9pEKwSHEPFeTEPDHz6+i+Xi98jVrduw0UvLS3JSbpy9Erv3WsKRuYtXa0x1XIoJa4gx4fFUhULpHzToROQ3Q0ctPLjnYy+/PkqlWpLt/RCTnK3wP0fWNq4DIp7OzrisVKrUaq1KZXoxZud/3x3dwXFPkJF6Xq9v5ireH9j7MYMKADx84MuuQRFTnnpn3OMvj3v8FQ/PHiA0mbyd8gDoGzAgLzvxcty+rgHhDKMgia+krDT38qW9KhOtWmWqUmre+8fgn7e8YW3jotVa5uUmCeFPJOmeyrtjGMAbSdFC7XL6/uvFO7b+/Y6sN3j4Ap3ONjsj1sREq1ZrGYVy43fL9u3+b+fhcUIgQJVK6+3d59D+L1paGoDvtcNHeRGCniuxS1BbU3bq+FoWCADORf+IAOMmvbr81R2Llm3IyrrClflFvth+BxJ25JjnFUpN9ImNxMKgIXMNIb+y7iDTA6cJk1//52u9Ivd+yjDKyoqbl2P3PzXnw3ZeTQRgszLjVn85y8e3PyA1N9QvXLYOgDJSz9s7ekXu/QyAmhrrLp3/ZeCwuXCHNpYMAfn69t9cuDwnO37oiEVi4TEg6N1vSklRRuyFXVw17az0yy1N9eMnvmpp7TJn0cqDez4tKc5EwNLS7MKidMHpwp3e7Pyla3Zte+vgvs8492dq6tl/vBud7gLYcgAAAtpJREFUm3P19t0lEfGxKW8cObCypqYUCFJunC64mTJ/8TedDovkD3i1iemSv/7wfy+FRO79TK02ra+vSow/4uXXmwA8PHoeO7jy5y1vmFs6pN04yzBKBSAQVJTfvHxpT1lZHgBlZcQqFAq+V4dClRh/yMrGybdreLvB0mNPrNj50z/9/MPt7D3573/4LYsHXHVWpk6SiYnWzT3YxMTMsDsVSls7dy+fXqam5oxC2TVgYGNDjYmJ1sLSMbT3hF59JwOgQqm2tXO3s/fglHCVUtN34JPBIaNqa8vUatOhoxY5OHkDMv5Bg7Vaa7XaVK02tbZxfWb+Z0U3U908uiuVJlbWzk7Ofm0Go1KbunTxNzOzBgD/oMEBQUN8/PoCokpt4tqlm4dXKAD5+YdbWzmzrF6t1jo4eQ8ZsdDFLQgRzcystWaWzc2NKrVm7GMv2dl7dXHvbqoxV6pNHBx9rKyczXTWfv7hFeV5KrVWbWI6fNRiB2dfhUJhaenk7OoPgKam5p7eoQyjAABERqezdfMIRgQnV39TU3NEVJtonV39R45dZmPn1ibyUqFUOTj6eHr3UqtNVSqNk7OfuYU9tzfVaq2rW5Cp1pIB7Bo0qKmxRq02HRAx09e/n5NzV3MLOwsr+27BIxoaa03U2sEjng0JHWfv6Glt69rVP9zKmntTUwdHnzkLv+YMwK4BAxsba2tryzw8e5pozNw9QtRqU3Ekra0t1xKPzZj1obmlPYoR2g+5G/43qQ0lk0yPCnpE+saGuuaWhtjzv5aWZE17+n001GJ66PUH2bKQSab7Qu4K8pN/2vwGEj330lY0NDHGNhVlZd1BJpkeNd2hzfYRah0KLYtl6SCTTI+8hGhb3Qjg4Q//l6WDTDLJdAurSZ4CmWSSSZYOMskkkywdZJJJJlk6yCSTTLJ0kEkmmWTpIJNMMsnSQSaZZJKlg0wyySRLB5lkkkmWDjLJJNOfmP4fvLeHRSLIvugAAAAASUVORK5CYII=" style="width: 95px;"></td>

			<td width="60%" style="text-align: center; "> <span style="font-size: 14px;font-family: Verdana, Geneva, Tahoma, sans-serif">
					<b>LABORATORIUM ANALISA PT.SIDO MUNCUL</b></span><br>
				<span style="font-size: 8px;font-family: Verdana, Geneva, Tahoma, sans-serif">Laboratorium Penguji</span><br>
				<span style="font-size: 8px;font-family: Verdana, Geneva, Tahoma, sans-serif">Jl.Soekarno Hatta Km. 28 Kec. Bergas-Klepu, Semarang Indonesia</span><br>
				<span style="font-size: 8px;font-family: Verdana, Geneva, Tahoma, sans-serif">Telp. (62-298)523515 (Hunting); Fax. (62-298)523509; E-mail: laboratkimia.sm@gmail.com </span>
			</td>
			<td width="20%" style="text-align: center;">
				<div><span style="font-size: 8px;display: inline-block;border: 1px solid black; padding: 5px;">FR/PR/PM.6-4/6/6</span></div>
			</td>
		</tr>


	</table>
	<hr>

	<table width="100%">
		<tr style="text-align: center;">
			<td style="text-align: center;">
				<span style="font-size: 13px"><b>Lembar Kerja Kalibrasi Alat Gelas (Volumetrik)</b></span>
			</td>
		</tr>
	</table>

	<p>
	<table>
		<tr>
			<td width="100px"></td>
			<th align="left" style="font-size: 10px">Nama Alat</th>
			<td style="font-size: 10px"> : <?= $dataJoinKeterangan['tipe_instrumen']; ?></td>
			<td width="10px" style="font-size: 10px"></td>
			<th align="left" style="font-size: 10px"> Dikalibrasi Oleh </th>
			<td style="font-size: 10px"> : <?= $dataJoinKeterangan['petugas']; ?></td>
		</tr>
		<tr>
			<td width="100px" style="font-size: 10px"></td>
			<th align="left" style="font-size: 10px">Merk / Pabrik</th>
			<td style="font-size: 10px"> : <?= $dataJoinKeterangan['merek']; ?></td>
			<td width="10px" style="font-size: 10px"></td>
			<th align="left" style="font-size: 10px"> Tgl. Kalibrasi </th>
			<td style="font-size: 10px"> : <?= $dataJoinKeterangan['tanggal_input']; ?></td>
		</tr>
		<tr>
			<td width="100px" style="font-size: 10px"></td>
			<th align="left" style="font-size: 10px">Kapasitas</th>
			<td style="font-size: 10px"> : <?= $dataJoinKeterangan['kapasitas']; ?> mL</td>
			<td width="10px" style="font-size: 10px"></td>
			<th align="left" style="font-size: 10px"> Tempat Kalibrasi </th>
			<td style="font-size: 10px"> : <?= $dataJoinKeterangan['tempat_kalibrasi']; ?></td>
		</tr>
		<tr>
			<td width="100px" style="font-size: 10px"></td>
			<th align="left" style="font-size: 10px">Type</th>
			<td style="font-size: 10px"> : <?= $dataJoinKeterangan['type']; ?></td>
			<td width="10px" style="font-size: 10px"></td>
			<th align="left" style="font-size: 10px"> Kode Alat </th>
			<td style="font-size: 10px"> : <?= $dataJoinKeterangan['id_aset']; ?></td>
		</tr>
		<tr>
			<td width="100px" style="font-size: 10px"></td>
			<th align="left" style="font-size: 10px">Skala Kalibrasi</th>
			<td style="font-size: 10px"> : <?= $dataJoinKeterangan['skala']; ?> mL</td>
			<td width="10px" style="font-size: 10px"></td>
			<th align="left" style="font-size: 10px"> </th>
			<td style="font-size: 10px"></td>
		</tr>
	</table>
	</p>



	<p align="left">
		<span style="font-size: 11px"><b><u>Kondisi Lingkungan :</b></u></span>
	</p>

	<table>
		<tr>
			<td width="150px"></td>
			<td></td>
			<td style="font-size: 11px;  font-weight: bold;">Awal</td>
			<td width="100px"></td>
			<td style="font-size: 11px;  font-weight: bold;">Ahkir</td>
		</tr>
		<tr>

			<td align="left" width="150px" style="font-size: 11px">Suhu (°C)</td>
			<td width="50px"> : </td>
			<td style="font-size: 11px"><?= $dataJoinKeterangan['suhu_awal']; ?></td>
			<td width="100px"></td>
			<td style="font-size: 11px"><?= $dataJoinKeterangan['suhu_ahkir']; ?></td>
		</tr>
		<tr>

			<td align="left" width="150px" style="font-size: 11px">Kelembaban (%) </td>
			<td width="50px"> : </td>
			<td><?= $dataJoinKeterangan['kelembaban_awal']; ?></td>
			<td width="50px"></td>
			<td><?= $dataJoinKeterangan['kelembaban_ahkir']; ?></td>
		</tr>
	</table>
	<br>
	<table style="border: 1px solid black;border-collapse: collapse;font-size: 11px" width="100%">
		<thead>
			<tr style="margin: 5px">
				<th style="border: 1px solid black; font-size: 11px">Perulangan</th>
				<th style="border: 1px solid black;font-size: 11px">Berat Kosong</th>
				<th style="border: 1px solid black;font-size: 11px">Berat Isi</th>
				<th style="border: 1px solid black;font-size: 11px">Suhu Akuades</th>
			</tr>
			<tr style="margin: 5px">
				<th style="border-right: 1px solid black; border-bottom:3px  solid black;font-size: 11px"></th>
				<th style="border-right: 1px solid black;border-bottom:3px  solid black;font-size: 11px">g</th>
				<th style="border-right: 1px solid black;border-bottom:3px  solid black;font-size: 11px">g</th>
				<th style="border-right: 1px solid black;border-bottom:3px  solid black;font-size: 11px">°C</th>
			</tr>
		</thead>
		<tbody>

			<?php
			$no = 1;
			foreach ($dataJoin as $row) :
			?>
				<tr style="margin: 5px">
					<td style="border: 1px solid black;font-size: 10px; text-align: center; "><?= $no++; ?></td>
					<td style="border: 1px solid black;font-size: 10px; text-align: center;"><?= $row['berat_kosong'] ?></td>
					<td style="border: 1px solid black;font-size: 10px; text-align: center;"><?= $row['berat_isi'] ?></td>
					<td style="border: 1px solid black;font-size: 10px; text-align: center;"><?= $row['suhu_akuades'] ?></td>
				</tr>

			<?php
			endforeach;
			?>
		</tbody>
	</table>


	</p>


	<table>
		<tr>
			<th align="left" style="font-size: 9px">Catatan :</th>
			<th></th>
			<td></td>
			<td></td>

		</tr>
		<tr>
			<th style="font-size: 9px">Standard Kalibrasi</th>
			<td style="font-size: 9px">: Analytical Balance; No Seri : C148056666</td>
			<td></td>
			<td></td>

		</tr>
		<tr>
			<th></th>
			<td></td>
			<!-- <td style="font-size: 9px">&nbsp;&nbsp;(No Sertifikat : 7884/MIM/2021</td> -->
			<td></td>
			<td></td>

		</tr>
		<tr>
			<th align="left" style="font-size: 9px">Dokumen Acuan</th>
			<td style="font-size: 9px">: Pedoman Mengenai Kalibrasi Peralatan Volumetrik KAN Pd.-02.08</td>
			<td></td>
			<td></td>

		</tr>

	</table>


	<table width="100%">
		<tr>
			<td align="center" width="33,3%"></td>

			<td align="center" width="33,3%"></b></td>
			<td align="center" width="33,3%">Ungaran, <?php echo  date("d M Y") ?></td>
		</tr>
		<tr>
			<td align="center" width="33,3%">Dikerjakan Oleh<br><br><br><br><br><u>( <?= $dataJoinKeterangan['petugas']; ?> )</u><b><br>Pelaksana</b></td>

			<td align="center" width="33,3%"></td>
			<td align="center" width="33,3%">Diperiksa Oleh<br><br><br><br><br><u>( <?= $dataJoinKeterangan['penyelia']; ?> )</u><b><br>Penyelia</b></td>
		</tr>
	</table>


	<p class="footer">
		<small>Halaman <b>1</b> dari <b>1</b></small>
	</p>


</body>

</html>