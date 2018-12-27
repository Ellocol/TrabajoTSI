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

class cliente(osv.Model):

    _name = 'cliente'
    _description = 'Informacion del cliente'
 
    _columns = {
            'name':fields.char('Nombre', size=64, required=True),
            'dni':fields.char('DNI',size=9,required=True),
            'telefono':fields.integer('Telefono',size=9),
            'foto':fields.binary('foto'),
            'email':fields.char('Email', size=64, required=False),
            'alquiler_ids':fields.one2many('alquiler','cliente_id','Alquileres'),
            'devolucion_ids':fields.one2many('devolucion','cliente_id','Devolucion'),
           
            
        }
