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

{
    "name": "Alquiler de autocaravanas",
    "version": "1.0",
    "depends": ["base"],
    "author": "grupo3",
    "category": "Alquiler",
    "description": """
    Alquiler de autocaravanas
    """,
    "init_xml": [],
    'update_xml': [],
    'data': ['vistas/cliente_view.xml','vistas/alquiler_view.xml','vistas/autocaravanas_view.xml','vistas/empleado_view.xml'
             ,'vistas/pedido_view.xml','vistas/proveedor_view.xml','vistas/reparacion_view.xml','vistas/descuento_view.xml'
             ,'vistas/devolucion_view.xml','workflow/pedido_workflow.xml','workflow/alquiler_workflow.xml',
             'workflow/devolucion_workflow.xml'],
    'demo_xml': [],
    'installable': True,
    'active': False
}