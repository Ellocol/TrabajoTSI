# -*- encoding: utf-8 -*-
##############################################################################
#
#    OpenERP, Open Source Management Solution
#    Copyright (C) 2004-2010 Tiny SPRL (http://tiny.be). All Rights Reserved
#    
#
#    This program is free software: you can redistribute it and/or modify
#    it under the terms of the GNU General Public License as published by
#    the Free Software Foundation, either version 3 of the License, or
#    (at your option) any later version.
#
#    This program is distributed in the hope that it will be useful,
#    but WITHOUT ANY WARRANTY; without even the implied warranty of
#    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#    GNU General Public License for more details.
#
#    You should have received a copy of the GNU General Public License
#    along with this program.  If not, see http://www.gnu.org/licenses/.
#
##############################################################################

from osv import osv
from osv import fields

class proveedor(osv.Model):

    _name = 'proveedor'
    _description = 'Informacion del proveedor'
 
    _columns = {
            'identificador':fields.char('Id', size=10, required=True),
            'telefono':fields.integer('Telefono', size=9),
            'empresa':fields.char('Empresa', size=64, required=True, readonly=False),
            'foto':fields.binary('foto'),
            'email':fields.char('Email', size=64, required=False),
            'ciudad': fields.char('Ciudad', size=64, required=True),
            'cp': fields.integer('Cp', size=10, required=True),
            'autocaravanas_ids':fields.one2many('autocaravanas', 'proveedor_id', 'Autocaravanas', required=True),
            'pedidos_ids':fields.one2many('pedido', 'proveedor_id', 'Pedidos'),
        }
