# **Clúster Kubernetes con Ansible en AlmaLinux 9**

Este repositorio contiene los **playbooks de Ansible** necesarios para automatizar la configuración de un clúster Kubernetes en AlmaLinux 9. Utilizando un nodo Ansible como orquestador, puedes configurar un nodo master y varios nodos worker sin recurrir a herramientas como Kubespray.

## **Características principales**
- Configuración de nodos (swap, SELinux, firewall, módulos del kernel, etc.).
- Instalación de Containerd y herramientas de Kubernetes (kubeadm, kubelet, kubectl).
- Inicialización del clúster y unión de nodos worker.
- Configuración de la red del clúster con Calico.

---

## **Requisitos**
1. **Virtualización:** Máquinas virtuales en VirtualBox o similar.
2. **Sistema Operativo:** AlmaLinux 9 Minimal en todos los nodos.
3. **Especificaciones mínimas:**
   - Nodo Ansible/Master: 2 GiB RAM, 2 vCPU.
   - Nodo Worker: 1 GiB RAM, 1 vCPU.

---

## **Estructura del repositorio**
- `inventory.ini`: Inventario de nodos para Ansible.
- `1-config.yml`: Configuración inicial de los nodos.
- `2-installation.yml`: Instalación de Containerd y herramientas de Kubernetes.
- `3-inicluster.yml`: Inicialización del clúster y configuración de red.

---

## **Uso**

### **1. Clonar el repositorio**
```bash
git clone https://github.com/brivaro/ansible
cd ansible
```

### **2. Configurar el inventario**
Edita el archivo `inventory.ini` con las IPs de los nodos en tu entorno.

### **3. Ejecutar los playbooks**
Sigue el orden indicado para ejecutar los playbooks:
```bash
ansible-playbook -i inventory.ini 1-config.yml
ansible-playbook -i inventory.ini 2-installation.yml
ansible-playbook -i inventory.ini 3-inicluster.yml
```

### **4. Validar el clúster**
Desde el nodo master:
```bash
kubectl get nodes
```

---

## **Contribuciones**
Si deseas mejorar este proyecto o reportar problemas, por favor abre un issue o envía un pull request.

## **Licencia**
Este proyecto está bajo la Licencia MIT. Consulta el archivo `LICENSE` para más detalles.

--- 
